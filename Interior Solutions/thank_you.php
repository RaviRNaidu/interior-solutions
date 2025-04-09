<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Connect to DB
$conn = new mysqli("localhost", "root", "", "interior_solutions");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

// Check if we have newly inserted booking IDs in session
$newBookingIds = isset($_SESSION['recent_booking_ids']) ? $_SESSION['recent_booking_ids'] : [];

$orders = [];
if (!empty($newBookingIds)) {
    // Build placeholders for the IN clause
    $placeholders = implode(',', array_fill(0, count($newBookingIds), '?'));
    $types = str_repeat('i', count($newBookingIds)); // all integers

    $sql = "SELECT * 
            FROM bookings
            WHERE user_id = ?
              AND id IN ($placeholders)
            ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    // Merge user_id with the newBookingIds for binding
    $bindValues = array_merge([$user_id], $newBookingIds);

    // Build the bind_param dynamic arguments
    // e.g. 'i' + 'i' repeated for each booking ID
    $bindTypes = 'i' . $types;

    // We need to pass them by reference for bind_param
    $refs = [];
    $refs[] = &$bindTypes;
    foreach ($bindValues as $key => $val) {
        $refs[] = &$bindValues[$key];
    }

    // Use call_user_func_array to bind
    call_user_func_array([$stmt, 'bind_param'], $refs);

    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row;
    }
    $stmt->close();
}

// Optionally, we can unset so it won't show again if page is refreshed
// unset($_SESSION['recent_booking_ids']);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f2f2f2;
            padding: 15px 30px;
        }

        /* Logo */
        .logo img {
            height: 50px;
            object-fit: cover;
        }

        /* Center the navigation */
        nav {
            display: flex;
            align-items: center;
            justify-content: center; /* Centering navigation */
            flex-grow: 1; /* Allows nav to take up available space */
            background-color: #f2f2f2;
            padding: 5px 0;
            height: 50px;
        }

        nav a, .dropdown {
            text-decoration: none;
            color: #444;
            font-weight: 500;
            font-size: 14px;
            padding: 10px 15px;
            border-radius: 4px;
            white-space: nowrap;
        }

        nav a.active {
            font-weight: bold;
            text-decoration: underline;
        }

        nav a:hover, .dropdown:hover {
            background-color: #ddd;
        }

        /* Dropdown Menu */
        .dropdown {
            position: relative;
        }

        .dropdown .dropdown-toggle {
            cursor: pointer;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            min-width: 150px;
        }

        .dropdown-menu li {
            list-style: none;
        }

        .dropdown-menu a {
            display: block;
            padding: 8px 12px;
            text-decoration: none;
            color: #444;
            font-size: 14px;
        }

        .dropdown-menu a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Move icons closer to the logout button */
        .nav-icons {
            display: flex;
            align-items: center;
            gap: 20px; /* Reduced gap to bring them closer */
            margin-right: 20px; /* Moves them slightly to the right */
        }

        /* Styling for Wishlist & Cart Icons */
        .nav-icons a {
            display: flex;
            align-items: center;
        }

        .nav-icons img {
            width: 22px;
            height: 22px;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }

        .nav-icons img:hover {
            transform: scale(1.1);
        }

        /* Logout Button */
        .logout-btn {
            background-color: rgb(27, 40, 42);
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            margin-left: 10px; /* Moves it slightly for better spacing */
        }

        .logout-btn:hover {
            background-color: rgb(66, 119, 121);
        }

        .main-container {
        /* Put your main content container separate from the footer container */
        margin-top: 50px;
        text-align: center;
        margin-bottom: 50px; /* Ensure enough space above footer */
      }
      .header-text {
        color: green;
        margin-bottom: 10px;
      }
      /* Outer box styling */
      .order-box {
        border: 2px solid #aaa;       /* Thicker border */
        border-radius: 10px;
        background: #f2f2f2;         /* New background color inside the box */
        padding: 30px;               /* More padding inside */
        max-width: 900px;           /* Wider max width so table doesn't overflow */
        margin: 30px auto;          /* Spacing from top/bottom */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Deeper shadow */
      }
      .order-box h3 {
        margin-bottom: 20px;
        color: #333;
      }
      /* Table styling */
      .order-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;          /* Add some horizontal spacing from box edges */
      }
      .order-table th, .order-table td {
        padding: 12px;
        border: 1px solid #ddd;
        vertical-align: middle;
      }
      .order-table th {
        background-color: #343a40;
        color: #fff;
      }
      /* Home button styling */
      .home-btn {
        margin-top: 20px;
        margin-bottom: 30px;
        color: #fff;
        border: none;
        padding: 10px 16px;
        border-radius: 5px;
        font-size: 15px;
        cursor: pointer;
        text-decoration: none;
        background-color: rgb(27, 40, 42);
      }
      .home-btn:hover {
        background-color: rgb(66, 119, 121);
      }

      footer {
            background-color: #f2f2f2;
            color: #333;
            padding-top: 20px;
        }

        footer .footer-top {
            padding: 20px 0;
        }

        footer .footer-top h4 {
            font-size: 16px;
            color: #333;
            font-weight: bold;
            margin-bottom: 10px;
        }

        footer .footer-top p {
            font-size: 14px;
            line-height: 1.8;
        }

        footer .footer-top a {
            color: #444;
            text-decoration: none;
        }

        footer .footer-top a:hover {
            text-decoration: underline;
        }

        footer .footer-bottom {
            background-color: #333;
            color: white;
            padding: 15px 0;
        }

        footer .footer-bottom p {
            margin: 0;
            font-size: 14px;
        }

        footer .footer-bottom a {
            color: white;
            font-size: 16px;
            margin-left: 10px;
        }

        footer .footer-bottom a:hover {
            color: #ddd;
        }

        footer .footer-bottom {
            background-color: #333;
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        footer .footer-bottom .footer-content {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
        }

        footer .footer-bottom img.footer-logo {
            height: 40px;
            object-fit: contain;
            margin-right: 15px;
        }

        footer .footer-bottom p {
            font-size: 14px;
            margin: 0;
            color: #ddd;
        }

        footer .footer-bottom .social-links {
            display: flex;
            gap: 15px;
        }

        footer .footer-bottom .social-links a img {
            height: 40px;
            width: 40px;
            cursor: pointer;
            transition: transform 0.3s, filter 0.3s;
            border-radius: 50%; /* Makes the image round */
            object-fit: cover; /* Ensures the image fits within the circular shape */
        }

        footer .footer-bottom .social-links a img:hover {
            transform: scale(1.2);
            filter: brightness(1.3);
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <a href="dashboard.php"><img src="img/interior.png" alt="Interior Solutions Logo"></a>
        </div>
        <nav>
            <a href="dashboard.php">Home</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">What We Do</a>
                <ul class="dropdown-menu">
                    <li><a href="customize_interiors.php">Customized Interiors</a></li>
                    <li><a href="design_and_build.php">Design And Build</a></li>
                </ul>
            </div>
            <a href="about_us.php">About Us</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">Products</a>
                <ul class="dropdown-menu">
                    <li><a href="kitchen.php">Kitchen</a></li>
                    <li><a href="bedroom.php">Bedroom</a></li>
                    <li><a href="dining.php">Dining Room</a></li>
                    <li><a href="living.php">Living Room</a></li>
                    <li><a href="decorative_units.php">Decorative Units</a></li>
                    <li><a href="kids_room.php">Kids Room</a></li>
                </ul>
            </div>
            <a href="gallery.php">Gallery</a>
            <a href="contact.php">Contact</a>
            <a href="orders.php">Orders</a>
        </nav>
    
        <!-- Wishlist and Cart Icons -->
        <div class="nav-icons">
            <a href="wishlist.php" class="wishlist-icon">
                <img src="img/heart.png" alt="Wishlist">
            </a>
            <a href="cart.php" class="cart-icon">
                <img src="img/cart.png" alt="Cart">
            </a>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </header>
    <div class="main-container container">
    <h1 class="header-text">Thank you. Your order has been received!</h1>
    <p>We have received your booking. Our team will contact you soon.</p>
    <p>Check your email for the booking confirmation message.</p>

    <?php if (empty($orders)): ?>
      <div class="order-box">
        <h3>No New Orders Found</h3>
        <p>You have no newly placed orders.<br>
           If you just placed an order and don't see it here, please refresh or check again.</p>
      </div>
    <?php else: ?>
      <div class="order-box">
        <h3>Order Details</h3>
        <p>Order Date: <?php echo date('F j, Y'); ?></p>
        <table class="order-table">
          <thead>
            <tr>
              <th>Design Image</th>
              <th>Design Name</th>
              <th>Price</th>
              <th>Amount Paid</th>
              <th>Remaining</th>
              <th>Payment Method</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($orders as $o): ?>
              <tr>
                <td>
                  <?php if (!empty($o['design_image'])): ?>
                    <img src="<?php echo htmlspecialchars($o['design_image']); ?>"
                         alt="Design Image" 
                         style="width:100px; height:60px; object-fit:cover; border-radius:4px;">
                  <?php else: ?>
                    N/A
                  <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($o['design_name']); ?></td>
                <td>₹<?php echo number_format($o['design_price'], 2); ?></td>
                <td>₹<?php echo number_format($o['amount_paid'], 2); ?></td>
                <td>₹<?php echo number_format($o['remaining_amount'], 2); ?></td>
                <td><?php echo htmlspecialchars($o['payment_method']); ?></td>
                <td><?php echo htmlspecialchars($o['status']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <p style="font-weight:bold; margin-top:10px;">Total Amount Paid: (Your 20% deposit)</p>
      </div>
    <?php endif; ?>

    <a href="dashboard.php" class="home-btn">Go to Homepage</a>
</div>
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>BENGALURU</h4>
                        <p>HSR Layout<br>+91 999 551 77 77</p>
                        <p>Yelahanka<br>+91 956 723 33 33</p>
                        <p>Whitefield<br>+91 949 760 22 22</p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h4>MYSURU</h4>
                        <p>BM Habitat Mall<br>+91 938 342 33 33</p>
                        <h4>MANGALURU</h4>
                        <p>Bejai<br>+91 949 606 22 22</p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h4>HYDERABAD</h4>
                        <p>Banjara Hills<br>+91 949 508 77 77</p>
                        <p>Kompally<br>+91 807 831 22 22</p>
                        <h4>MARKETING OFFICE</h4>
                        <p>UAE<br>+971 56 665 64 14</p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h4>Quick Links</h4>
                        <p><a href="#">Interior Designers in Bengaluru</a></p>
                        <p><a href="#">Interior Designers in Chennai</a></p>
                        <p><a href="#">Interior Designers in Hyderabad</a></p>
                        <p><a href="#">Contact Us</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-content">
                <div class="d-flex align-items-center">
                    <img src="img/interior.png" alt="Footer Logo" class="footer-logo">
                    <p>&copy; 2025 Interior Solutions. All Rights Reserved.</p>
                </div>
                <div class="social-links">
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="img/facebook.png" alt="Facebook">
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=7204941908&text=Hello%21+%0A+How+can+i+help+you%3F+" target="_blank">
                        <img src="img/whatsapp.jpg" alt="WhatsApp">
                    </a>
                    <a href="https://www.pinterest.com" target="_blank">
                        <img src="img/Pinterest.png" alt="Pinterest">
                    </a>
                    <a href="https://www.youtube.com" target="_blank">
                        <img src="img/youtube.png" alt="YouTube">
                    </a>
                    <a href="https://www.linkedin.com" target="_blank">
                        <img src="img/linkedin.png" alt="LinkedIn">
                    </a>
                    <a href="https://www.instagram.com/ravi_r_naidu/" target="_blank">
                        <img src="img/insta.png" alt="Instagram">
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
