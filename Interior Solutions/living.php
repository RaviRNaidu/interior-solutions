<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Living</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
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

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: url('img/living.jpg') no-repeat center center/cover;
            padding: 100px 50px;
            height: 60vh;
            color: white;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }

        .hero .text {
            position: relative;
            z-index: 1;
            max-width: 500px;
        }

        .hero h1 {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 32px;
            margin-bottom: 20px;
        }

        .intro-section {
            background-color:#f9f9f9 ; /* White  #ffffff background for the first section */
            text-align: center;
            padding: 50px 20px;
        }
        .intro-section h2 {
            font-size: 36px;
            color: #333;
        }
        .intro-section p {
            font-size: 18px;
            color: #555;
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.6;
        }
        .content-section {
            background-color: #f2f2f2; /* Light gray background for the second section */
            padding: 50px 20px;
        }
        .content-section2 {
            background-color: #f9f9f9; /* Light gray background for the second section */
            padding: 50px 20px;
        }
        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            gap: 50px;
            align-items: center;
        }
        .text-content {
            flex: 1;
        }
        .text-content h2 {
            font-size: 28px;
            color: #222;
        }
        .text-content p {
            font-size: 18px;
            color: #444;
            line-height: 1.6;
        }
        .view-more, .talk {
            display: inline-block;
            background-color: #1b282a;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            font-size: 16px;
            text-decoration: none;
            transition: 0.3s ease;
            text-align: center;
            text-decoration: none;
        }
        .view-more:hover {
            background-color: #427779;
        }
        .talk:hover {
            background-color: #427779;
        }
        .image-gallery {
            display: flex;
            gap: 15px;
        }
        .image-gallery img {
            width: 350px;
            height: 250px;
            object-fit: cover;
            border-radius: 5px;
        }
        /* Popup Form */
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    display: none;
    align-items: center;
    justify-content: center;
}

.popup {
    background: white;
    padding: 25px;
    border-radius: 10px;
    width: 430px;
    text-align: center;
    position: relative;
}

.popup-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.popup h2 {
    font-size: 22px;
    margin: 0;
    color: #333;
}

.close-btn {
    background: none;
    border: none;
    font-size: 24px;
    cursor: pointer;
    color: #555;
}

.popup p {
    font-size: 14px;
    color: #666;
    margin-bottom: 20px;
}

/* Form Styling */
form input,
.phone-input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.phone-input {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
}

.phone-input select {
    border: none;
    background: #f3f3f3;
    padding: 10px;
    font-size: 14px;
}

.phone-input input {
    flex: 1;
    border: none;
    padding: 10px;
}

.submit-btn {
    width: 100%;
    background: rgb(27, 40, 42);
    color: white;
    border: none;
    padding: 12px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    margin-top: 10px;
}

.submit-btn:hover {
    background: rgb(66, 119, 121);
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

.floating-buttons {
    position: fixed;
    bottom: 100px; /* Move above the footer */
    right: 20px;
    z-index: 999; /* Ensure it doesn't overlap essential elements */
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.floating-buttons a {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color:rgb(27, 40, 42);
    color: white;
    padding: 12px 18px;
    border-radius: 50px;
    font-size: 14px;
    text-decoration: none;
    font-weight: 500;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.floating-buttons a:hover {
    background-color:rgb(66, 119, 121);
    transform: translateY(-3px);
}

.floating-buttons a i {
    margin-right: 8px;
    font-size: 18px;
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
            <!-- Products Dropdown -->
             <div class="dropdown">
                <a href="#" class="dropdown-toggle" >Products</a>
                <ul class="dropdown-menu">
                    <li><a href="kitchen.php">Kitchen</a></li>
                    <li><a href="bedroom.php">Bedroom</a></li>
                    <li><a href="dining.php">Dining Room</a></li>
                    <li><a href="living.php" class="active">Living Room</a></li>
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
    <div class="hero">
        <div class="text">
            <h1>Customized Living Room</h1>
            <p>Your Modern Life Deserves</p>
        </div>
    </div>
    <div class="intro-section">
        <h2>CUSTOM-MADE LIVING ROOM</h2>
        <p>Interior Solutions can help you to bring life into your living room. You may have a clear idea about living room decor, and may even know what needs to be done to make the living room interior design more attractive and convenient. Our top interior designers in the showroom will help you to create furniture that matches your style and requirements. Interior Solutions can provide custom made LCD TV Unit, sofa set, center table, living-dining partition etc. matching the overall theme of the house interiors. Contact our nearest showroom to view a wide range of living room furniture designs. Some of our best interior designers at the showroom will guide you to create suitable living room interior designs as per your choice.</p>
    </div>
    
    <div class="content-section">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Bookshelves</h2>
                <p>Bookshelves are the first love for a bibliophile. With our intelligent designs combined with the best quality materials and finish, your home is sure to be a head-turner. Our bookshelves are not just about storing books, they are designed to enhance the look of your living space and hold a variety of things such as decor items, souvenirs and even photo frames. All our units go through multiple quality checks to ensure accurate dimensions, and finish.</p>
                <a href="bookshelves.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/book.jpg" alt="Bookshelves1">
                <img src="img/book1.jpg" alt="Bookshelves2">
            </div>
        </div>
    </div>
    <div class="content-section2">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Center Table</h2>
                <p>Centre table to be kept near the sofa set for a living room is designed and custom-made by D`LIFE for flat or house anywhere in Pune, Hyderabad, Bangalore, Kerala, Mangalore, Mysore, Nagercoil, Chennai, Madurai and Coimbatore. Customers choose a suitable design from available on our website or showrooms and customize it further to match the requirements and space limitations.</p>
                <a href="center_table.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/centertable.jpg" alt="Center Table 1">
                <img src="img/centertable1.jpg" alt="Center Table 2">
            </div>
        </div>
    </div>
    <div class="content-section">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Chairs</h2>
                <p>Interior Solutions can give you tailor-made chairs to complement your living rooms with the contemporary flourish you always dreamed of. We can offer you the perfect recommendations to suit your customised interiors. Feel free to explore our diverse range of chair collections to meet your style and preferences.</p>
                <a href="chairs.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/chairs.jpg" alt="Chairs1">
                <img src="img/chairs1.jpg" alt="Chairs2">
            </div>
        </div>
    </div>
    <div class="content-section2">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>LCD Display Unit</h2>
                <p>LCD Display Unit will be a centre of attraction in any living room when it is beautifully designed and made in theme matching the whole interiors. It can be further extended as a storage space in addition to display of television, music system, video player etc.</p>
                <a href="LCD_display_unit.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/LCD.jpg" alt="LCD Display Unit 1">
                <img src="img/LCD1.jpg" alt="LCD Display Unit 2">
            </div>
        </div>
    </div>
    <div class="content-section">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Living-Dining Partition</h2>
                <p>Living- Dining Partition Design is done with 2 purposes. One is to prevent the direct view of dining from the living side and another is to add wood touch beautification where an opportunity is found. This may work as a showcase to display some artistic things. DLIFE will make the partition stylish and suitable to the space available. Discuss with our designer while discussing interior works for your home.</p>
                <a href="living-dining_partition.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/livingdining.jpg" alt="Living-Dining Partition 1">
                <img src="img/livingdining1.jpg" alt="Living-Dining Partition 2">
            </div>
        </div>
    </div>
    <div class="content-section2">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Prayer Unit</h2>
                <p>A Prayer unit may be difficult in a house or flat due to the space constraints. But many of our clients have the requirement of a pooja unit that can be fixed in a living room. Size and requirement may vary and thus the design. It should match with the main theme of living room interiors. Below are some of the patterns that we have created but not limited only to these.</p>
                <a href="prayer_unit.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/prayer.jpg" alt="Prayer Unit 1">
                <img src="img/prayer1.jpg" alt="Prayer Unit 2">
            </div>
        </div>
    </div>
    <div class="content-section">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Shoe Rack</h2>
                <p>Get a shoe rack custom-made as per the space available in the living room at the side of the main entrance. While discussing interior works for a house, customers may select one of the shoe rack designs we already have, or ask for an entirely new one. Shoe rack can be made smaller or larger as per space available in the foyer. Keep everything tidy and in order, give the best ambiance at the entrance of an apartment or villa.</p>
                <a href="shoe_rack.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/shoe.jpg" alt="Shoe Rack 1">
                <img src="img/shoe1.jpg" alt="Shoe Rack 2">
            </div>
        </div>
    </div>
    <div class="content-section2">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Sofas</h2>
                <p>Interior Solutions can either make or buy a suitable sofa set for your living room as part of the interior works contract. Designers will recommend the options that would match the best with other parts of home interiors. Genuine leather, artificial leather and fabric styles of reputed brands are made available in our collection.</p>
                <a href="sofas.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/sofas.jpg" alt="Sofas 1">
                <img src="img/sofas1.jpg" alt="Sofas 2">
            </div>
        </div>
    </div>
    <div class="intro-section">
        <button class="talk" onclick="openTalkForm()">Talk to our interior designing experts</button>
    </div>

<!-- Talk to Expert Popup -->
<div class="popup-overlay" id="popupForm">
    <div class="popup">
        <div class="popup-header">
            <h2>Talk to our Interior designing expert</h2>
            <button class="close-btn" onclick="closeForm('popupForm')">×</button>
        </div>
        <hr>
        <p>Please fill out the enquiry below and we will get back to you as soon as possible</p>
        <form id="enquiryForm" onsubmit="submitForm(event, 'talk_expert')">
            <input type="text" name="name" placeholder="Name" required>
            
            <div class="phone-input" >
                <select>
                    <option value="+91">🇮🇳 +91</option>
                    <option value="+1">🇺🇸 +1</option>
                    <option value="+44">🇬🇧 +44</option>
                    <option value="+61">🇦🇺 +61</option>
                </select>
                <input type="tel" name="phone" placeholder="Contact Number" required>
            </div>

            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="project_location" placeholder="Project Location" required>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>

<!-- Free Estimate Popup -->
<div class="popup-overlay" id="popupFloatingForm">
    <div class="popup">
        <div class="popup-header">
            <h2>GET FREE ESTIMATE</h2>
            <button class="close-btn" onclick="closeForm('popupFloatingForm')">×</button>
        </div>
        <hr>
        <p>Please fill out the enquiry below and we will get back to you as soon as possible</p>
        <form id="enquiryFloatingForm" onsubmit="submitForm(event, 'free_estimate')">
            <input type="text" name="name" placeholder="Name" required>
            
            <div class="phone-input">
                <select>
                    <option value="+91">🇮🇳 +91</option>
                    <option value="+1">🇺🇸 +1</option>
                    <option value="+44">🇬🇧 +44</option>
                    <option value="+61">🇦🇺 +61</option>
                </select>
                <input type="tel" name="phone" placeholder="Contact Number" required>
            </div>

            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="project_location" placeholder="Project Location" required>
            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</div>
<!-- Single Script File -->
<script src="popupForms.js"></script>
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
<div class="floating-buttons">
    <a href="https://wa.me/7204941908" class="whatsapp-button" target="_blank">
        <i class="fab fa-whatsapp"></i> WhatsApp
    </a>
    <a href="mailto:contact@company.com" class="mail-button">
        <i class="fas fa-envelope"></i> Send Mail
    </a>
    <a class="free_estimate" onclick="openEstimateForm()">Free Estimate</a>
</div>
</footer>
</body>
</html>