<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        
        /* === Mobile styles === */
        @media (max-width: 992px) {
            /* Hide desktop nav, icons, logout */
            nav {
                display: none;
            }
            .nav-icons {
                display: none;
            }
            .logout-btn {
                display: none;
            }
            /* Show hamburger icon instead */
            .hamburger {
                display: block !important;
            }
        }

        /* Default: hide hamburger if bigger than 992px */
        /* The hamburger icon default hidden */
        .hamburger {
            display: none;
            position: absolute;
            top: 15px; right: 30px;
            width: 28px; height: 22px;
            cursor: pointer; z-index: 10000;
        }
        .hamburger span {
            display: block;
            width: 100%;
            height: 3px;
            background: #444;
            margin-bottom: 5px;
            border-radius: 2px;
        }

        /* Slide-Out Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -250px; /* hidden off-screen initially */
            width: 250px;
            height: 100%;
            background: #f2f2f2;
            box-shadow: -4px 0 8px rgba(0,0,0,0.2);
            transition: right 0.3s ease;
            z-index: 99999; /* above everything */
            padding: 60px 20px; 
        }
        .mobile-menu.open {
            right: 0; /* slide into view */
        }
        .mobile-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .mobile-menu ul li {
            margin-bottom: 10px;
        }
        .mobile-menu ul li a {
            display: block;
            color: #444;
            text-decoration: none;
            font-size: 16px;
            padding: 8px;
            border-radius: 4px;
        }
        .mobile-menu ul li a:hover {
            background-color: #ddd;
        }
        /* Nested dropdown in mobile */
        .mobile-dropdown {
            cursor: pointer;
        }
        .mobile-dropdown > ul {
            display: none;
            margin-left: 15px;
        }
        .mobile-dropdown.open > ul {
            display: block;
        }
        .mobile-dropdown > a::after {
            content: ' ▼';
            font-size: 12px;
        }

        h2 {
            text-align: center;
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
        }
       /* Main Container */
        .gallery-container {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
        }
/* Each Project Box */
        .project-box {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 500px;
            gap: 20px;
            transition: transform 0.3s ease-in-out;
        }

/* Hover effect */
        .project-box:hover {
            transform: translateY(-5px);
        }

/* Image Styling */
        .project-box img {
            width: 150px;
            height: 150px;
            border-radius: 10px;
            object-fit: cover;
        }

/* Text Content */
        .info {
            max-width: 300px;
        }

        .info h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 10px;
        }

        .info p {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
            line-height: 1.5;
        }

        .info a {
            display: inline-block;
            text-decoration: none;
            color: white;
            background-color:rgb(9, 10, 10);
            padding: 8px 12px;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .info a:hover {
            background-color: #0056b3;
        }

/* Responsive Design */
        @media (max-width: 768px) {
            .gallery-container {
            flex-direction: column;
            align-items: center;
        }

        .project-box {
            flex-direction: column;
            text-align: center;
            max-width: 100%;
        }

        .project-box img {
            width: 100%;
            height: auto;
        }
        }
        .gallery img { 
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
            border-radius: 10px;  
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
 
        }

        .gallery img:hover {
            transform: scale(1.05); /* Slight zoom in effect */
        }  

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: url('img/gallery.jpg') no-repeat center center/cover;
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

        footer .footer-bottom a:hover {
            color: #ddd;
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

        /* Responsive adjustments for Floating Buttons on small screens */
        @media (max-width: 768px) {
            .floating-buttons {
                bottom: 70px;  /* Lower the distance from the bottom */
                right: 20px;   /* Reduce right margin */
                flex-direction: column; /* Switch to row if you prefer horizontal layout */
                gap: 10px;
                width: auto;
            }
            .floating-buttons a {
                padding: 8px 12px; /* Reduce padding */
                font-size: 12px;   /* Smaller text */
            }
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
            <a href="gallery.php" class="active">Gallery</a>
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

    <!-- HAMBURGER for mobile screens only -->
    <div class="hamburger" onclick="toggleMobileMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>
<!-- Mobile menu -->
<div class="mobile-menu" id="mobileMenu">
  <ul>
    <li><a href="dashboard.php" class="active">Home</a></li>
    <!-- "What We Do" -->
    <li class="mobile-dropdown">
      <a href="#">What We Do</a>
      <ul>
        <li><a href="customize_interiors.php">Customized Interiors</a></li>
        <li><a href="design_and_build.php">Design And Build</a></li>
      </ul>
    </li>
    <li><a href="about_us.php">About Us</a></li>
    <!-- "Products" -->
    <li class="mobile-dropdown">
      <a href="#">Products</a>
      <ul>
        <li><a href="kitchen.php">Kitchen</a></li>
        <li><a href="bedroom.php">Bedroom</a></li>
        <li><a href="dining.php">Dining Room</a></li>
        <li><a href="living.php">Living Room</a></li>
        <li><a href="decorative_units.php">Decorative Units</a></li>
        <li><a href="kids_room.php">Kids Room</a></li>
      </ul>
    </li>
    <li><a href="gallery.php">Gallery</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="orders.php">Orders</a></li>
    <li><a href="wishlist.php">Wishlist</a></li>
    <li><a href="cart.php">Cart</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</div>
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('open');
        }
        // Nested submenus in mobile
        const mobileDropdowns = document.querySelectorAll('.mobile-dropdown > a');
        mobileDropdowns.forEach((trigger) => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const parentLi = this.parentElement; 
                parentLi.classList.toggle('open');
            });
        });
    </script>
    <div class="hero">
        <div class="text">
            <h1>YOUR HOME. OUR DESIGN</h1>
            <p>Expertly crafted interiors by professionals</p>
        </div>
    </div>
    <div class="heading"><br><br>
    <h2><b>ACTUAL PROJECT PHOTOGRAPHS</b></h2>
    <br><br>
    <div class="container">
    <div class="prodect">
    <div class="gallery-container">
     <!-- first Gallery Item -->
     <div class="project-box">
            <img src="img/videog.jpg" alt="Gallery Image 1">
            <div class="info">
                <h3>VIDEO<br><b>GALLERY</b></h3>
                <p>If you are looking for clearly laid out answers and realistic inspirations to your questions over interior design, and design process, andhow much our clients love our works, take the time to understand why we are the best for your deram home.</p>
                <a href="video gallery.php">View Now</a>
            </div>
        </div>
         <!-- second Gallery Item -->
         <div class="project-box">
            <img src="img/in galary.jpg" alt="Gallery Image 1">
            <div class="info">
                <h3>INTERIOR<br><b>GALLERY</b></h3>
                <p>We have worked on a wide range of residential projects including apartments, luxury villas, and family homes.and holidays homes.Having worked on residential projects for over 20 years we know what adds value and what you looking for.</p>
                <a href="javascript:void(0);" id="viewInteriorGallery">View Now</a>
                <!-- JavaScript to Scroll to Gallery -->
<script>
document.getElementById("viewInteriorGallery").addEventListener("click", function() {
    document.getElementById("gallery").scrollIntoView({ behavior: "smooth" });
});
</script>
            </div>
        </div>
        <!-- third Gallery Item -->
        <div class="project-box">
            <img src="img/wise gallery.jpg" alt="Gallery Image 2">
            <div class="info">
                <h3>PROJECT-WISE<br><b>GALLERY</b></h3>
                <p>We have designed interiors for modern family homes to luxury residential projects across South India.From initial consultation to a completely finished home, we provide our clients with the best possible interior designs and ideas that are comfortable, affordable,and livable. </p>
                <a href="project_vice_gallery.php">View Now</a> 
                </div>
        </div>
    </div>
    </div>
    </div>
<br>
<br>
<h2>INTERIOR<br><b>GALLERY</h2>
<div id="gallery" class="gallery">
    <img src="img/gallery q.jpg" alt="Residential Interior Design" height="300" width="350">  
    <img src="img/gallery q.jpg" alt="Gallery Image 1" height="300" width="350">
           <img src="img/gallery e.webp" alt="Gallery Image 2" height="300" width="350">
           <img src="img/gallery r.avif" alt="Gallery Image 3" height="300" width="350">
           <img src="img/galllery h.webp" alt="Gallery Image 4" height="300" width="350">
           <img src="img/gallery t.jpg" alt="Gallery Image 5" height="300" width="350">
           <img src="img/gallery y.avif" alt="Gallery Image 6" height="300" width="350">
           <img src="img/gallery u.jpg" alt="Gallery Image 7" height="300" width="350">
           <img src="img/gallery i.webp" alt="Gallery Image 8" height="300" width="350">
           <img src="img/gallery g.jpg" alt="Gallery Image 9" height="300" width="350">
           <img src="img/gallery o.jpg" alt="Gallery Image 10" height="300" width="350">
           <img src="img/gallery p.avif" alt="Gallery Image 11" height="300" width="350">
           <img src="img/gallery a.webp" alt="Gallery Image 12" height="300" width="350">
           <img src="img/gallery s.jpeg" alt="Gallery Image 13" height="300" width="350">
           <img src="img/gallery d.webp" alt="Gallery Image 14" height="300" width="350">
           <img src="img/gallery f.jpg" alt="Gallery Image 15" height="300" width="350">
<br>
<br>
<br>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>