<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$conn = new mysqli("localhost", "root", "", "interior_solutions");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch cart items
$sql = "SELECT cart.id AS cart_id, designs.id AS design_id, designs.image, designs.name, designs.price 
        FROM cart 
        JOIN designs ON cart.design_id = designs.id 
        WHERE cart.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $cart_items[] = $row;
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #f8f9fa;
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

        /* Cart Page Styles */
        .cart-container {
            text-align: center;
            margin: 50px auto;
            width: 80%;
        }
        .cart-logo {
            width: 75px;
            margin-right: 10px;
        }
        .cart-header {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }
        .cart-header h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
    
        /* Table Styling */
        .cart-table {
            width: 100%;
            border-collapse: separate; /* Change collapse to separate */
            border-spacing: 0 15px; /* Add spacing between rows */
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-table th, .cart-table td {
            padding: 15px;
            text-align: center;
            border: none; /* Remove all borders */
            vertical-align: middle; /* Ensures vertical alignment */
        }
        /* Center align text and button */
        .cart-table td {
            vertical-align: middle; /* Align text and button with image */
        }

        /* Style remove button */
        .cart-table .remove-btn {
            padding: 8px 15px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .cart-table .remove-btn:hover {
            background-color: darkred;
        }

        .cart-table th {
            background-color: #343a40 !important;
            color: white !important;
            font-weight: bold;
        }

        /* Adjust table row background for a cleaner look */
        .cart-table tbody tr {
            background: white;
            border-radius: 10px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            display: table-row;
        }

        .cart-table tbody tr:last-child {
            margin-bottom: 0;
        }

        /* Ensure the table fits well */
        .cart-container {
            width: 90%;
            margin: auto;
        }

        /* Fix Image Not Displaying */
        .cart-image {
            width: 230px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
        }
        /* Empty Cart Styles */
        .empty-cart {
            text-align: center;
            margin-top: 100px;
            margin-bottom: 100px; /* Add bottom margin to prevent overlap */
        }
    .empty-cart img {
      width: 270px;
      margin-bottom: 20px;
    }
    .empty-cart h3 {
      font-size: 22px;
      margin-top: 20px;
      color: #555;
    }
    .empty-cart p {
      color: #777;
      font-size: 16px;
    }
    .explore-btn {
      margin-top: 10px;
      padding: 10px 20px;
      font-size: 16px;
      background-color: rgb(27, 40, 42);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      display: inline-block;
    }
    .explore-btn:hover {
      background-color: rgb(66, 119, 121);
    }

    /* Cart Totals */
    .cart-totals {
      max-width: 400px;
      margin: 30px auto;
      padding: 20px;
      background: #f9f9f9;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }
    .cart-totals:hover {
      transform: scale(1.02);
    }
    .cart-totals h3 {
      text-align: center;
      margin-bottom: 15px;
    }
    .totals-row {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      font-size: 16px;
    }
    .totals-divider {
      border-top: 1px solid #ddd;
      margin: 8px 0;
    }
    .checkout-btn {
      width: 100%;
      margin-top: 15px;
      background-color: rgb(27, 40, 42);
    }
    .checkout-btn:hover {
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
            <a href="#" class="cart-icon">
                <img src="img/cart.png" alt="Cart">
            </a>
        </div>

        <a href="logout.php" class="logout-btn">Logout</a>
    </header>
    <div class="container mt-5">
        <div class="cart-container">
            <div class="cart-header">
                <img src="img/shopping-bag.png" class="cart-logo" alt="Cart Logo">
                <h2>My Cart</h2>
            </div>

            <!-- Cart Table -->
            <div id="cart-content">
                <?php if (!empty($cart_items)): ?>
                    <table class="table table-bordered cart-table">
                        <thead>
                            <tr>
                                <th>Design</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cart_items as $item): ?>
                        <tr data-cart-id="<?= $item['cart_id'] ?>" data-price="<?= $item['price'] ?>">
                        <td>
                            <img src="<?php echo $item['image']; ?>" 
                                alt="Design Image" 
                                class="cart-image">
                            </td>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td>₹<?= number_format($item['price'], 2) ?></td>
                            <td>
                                <button class="btn btn-danger remove-from-cart" 
                                data-cart-id="<?= $item['cart_id'] ?>">Remove</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                <!-- Cart Totals -->
                <div class="cart-totals">
                    <h3>Cart Totals</h3>
                    <div id="totals-list">
                        <?php foreach ($cart_items as $item): ?>
                            <div class="totals-row">
                                <span><?= $item['name'] ?></span>
                                <span>₹<?= number_format($item['price'], 2) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="totals-divider"></div>
                    <div class="totals-row">
                        <strong>Subtotal:</strong>
                        <strong id="subtotal">₹0.00</strong>
                    </div>
                    <div class="totals-row">
                        <strong>To Pay Now (20%):</strong>
                        <strong id="to-pay">₹0.00</strong>
                    </div>
                    <div class="totals-divider"></div>
                    <div class="totals-row">
                        <strong>Total Amount:</strong>
                        <strong id="total-amount">₹0.00</strong>
                    </div>
                    <button class="btn btn-dark checkout-btn">Proceed to Checkout</button>
                </div>

                <?php else: ?>
                <div class="empty-cart">
                    <img src="img/empty_cart.png" alt="Empty Cart">
                    <h3>Looks like you have not added anything to your cart.</h3>
                    <p>Go ahead and explore top designs.</p>
                    <a href="kitchen.php" class="explore-btn">Explore Designs</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
$(document).ready(function () {
    function updateCartTotals() {
        let subtotal = 0;

        $("#totals-list").empty();
        $("tbody tr").each(function () {
            let designName = $(this).find("td:nth-child(2)").text();
            let price = parseFloat($(this).data("price"));
            subtotal += price;

            // Append design names and prices in Cart Totals
            $("#totals-list").append(`<div class="totals-row"><span>${designName}</span><span>₹${price.toFixed(2)}</span></div>`);
        });

        let toPayNow = subtotal * 0.2;
        let totalAmount = toPayNow;

        $("#subtotal").text(`₹${subtotal.toFixed(2)}`);
        $("#to-pay").text(`₹${toPayNow.toFixed(2)}`);
        $("#total-amount").text(`₹${totalAmount.toFixed(2)}`);
    }

    // Initial Cart Totals Calculation
    updateCartTotals();

    // Remove item from cart
    $(".remove-from-cart").click(function () {
        let cartId = $(this).data("cart-id");
        let row = $(this).closest("tr");

        $.ajax({
            url: "remove_from_cart.php",
            type: "POST",
            data: { cart_id: cartId },
            success: function (response) {
                if (response === "success") {
                    row.remove(); // Remove row from table
                    updateCartTotals(); // Recalculate totals

                    // If cart is empty, show the empty cart message dynamically
                    if ($("tbody tr").length === 0) {
                        $("#cart-content").html(`
                            <div class="empty-cart">
                                <img src="img/empty_cart.png" alt="Empty Cart">
                                <h3>Looks like you have not added anything to your cart.</h3>
                                <p>Go ahead and explore top designs.</p>
                                <a href="kitchen.php" class="explore-btn">Explore Designs</a>
                            </div>
                        `);
                    }
                }
            }
        });
    });
});
$(".checkout-btn").click(function() {
        window.location.href = "payment.php";
    });
</script>
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
