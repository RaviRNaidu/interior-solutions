<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interior Solutions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css">
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
            /* Added z-index fix here */
            position: relative;
            z-index: 9999; /* Ensures header and nav are on top of slider */
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
            /* Also ensure nav is on top if needed */
            position: relative;
            z-index: 9999; /* Another possible fix if needed */
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
            z-index: 9999; /* Ensure the dropdown is above the slider */
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

        /* Swiper styles for Hero Slider */
        .swiper.hero-slider {
            width: 100%;
            height: 60vh;
        }
        .swiper-slide {
            display: flex;
            align-items: center;
            justify-content: center;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }
        .hero-content {
            position: absolute;
            text-align: center;
            color: white;
            z-index: 2;
        }
        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .hero-btn {
            display: inline-block;
            padding: 12px 24px;
            background: #fff;
            color: #333;
            text-decoration: none;
            font-size: 1.2rem;
            border-radius: 5px;
            transition: 0.3s ease;
        }
        .hero-btn:hover {
            background: #edebea;
        }
        .swiper-button-next,
        .swiper-button-prev {
            color: white;
        }
        .swiper-pagination-bullet {
            background: white;
        }

        .custom-made {
            text-align: center;
            padding: 40px 20px;
            background-color: #f9f9f9;
        }

        .custom-made h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        /* Styles for first section of circles */
        .co-circle {
            display: flex;
            flex-wrap: wrap;
            gap: 40px; /* Space between circles */
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }
        .circle-container {
            display: flex;
            align-items: center;
        }
        .circle {
            width: 160px;
            height: 160px;
            border: 2px solid #000; /* Black border */
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.5s ease, color 0.5s ease;
            color: #000; /* Default text color */
        }
        .circle:hover {
            transform: scale(1.05);
        }
        /* Styles for second section of circles */
        .co-circle1 {
            display: flex;
            flex-wrap: wrap;
            gap: 5px; /* Space between each circle+text+arrow block */
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }
        .circle-container1 {
            display: flex;
            align-items: center;
        }
        .circle-text-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .circle1 {
            width: 160px;
            height: 160px;
            border: 2px solid #000;
            border-radius: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.5s ease, color 0.5s ease;
            color: #000;
        }
        .circle-title {
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
            text-align: center;
            max-width: 160px;
        }
        .arrow {
            width: 50px;
            height: 50px;
            margin: 0 20px;
        }
        .arrow path {
            stroke: black;
            stroke-width: 2;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
        }
        @media (max-width: 768px) {
            .co-circle {
                flex-direction: column;
                gap: 20px;
            }
            .circle-container {
                flex-direction: column;
            }
            .co-circle1 {
                flex-direction: column;
                gap: 20px;
            }
            .circle-container1 {
                flex-direction: column;
            }
            .arrow {
                transform: rotate(90deg);
                margin: 10px 0;
            }
        }

        .spotlight {
            padding: 50px 30px;
            background-color: #f9f9f9;
        }

        .spotlight h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            color: #444;
        }

        .products {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .product {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .product img {
            width: 100%;
            height: auto;
        }

        .product .info {
            padding: 15px;
            text-align: center;
        }

        .product .info h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .product .info p {
            font-size: 14px;
            color: #666;
        }
        .btn .product{
            background-color: rgb(27, 40, 42);
            padding: 10px 20px;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Three columns */
            grid-auto-rows: auto;
            gap: 10px;
            width: 90%;
            max-width: 1200px;
            padding: 20px;
            margin: auto;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease, filter 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
            filter: blur(3px) brightness(0.7);
        }

        .gallery-item .caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #fff;
            font-size: 2rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            text-align: center;
            z-index: 2;
            pointer-events: none;
        }

        /* Assign grid spans */
        .kitchen {
            grid-column: span 3; /* Full width */
            height: 350px;
        }

        .kids-room {
            grid-column: span 3; /* Force to Row 3, full width */
            grid-row: 3;
            height: 250px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .gallery {
                grid-template-columns: 1fr;
            }

            .gallery-item {
                grid-column: span 1;
                height: auto;
            }

            .gallery-item .caption {
                font-size: 1.5rem;
            }
        }


        .custom-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 60px 10%;
        }

.section-one {

    background-color: #f9f9f9; /* Light grayish tone for contrast */
}

.section-two {
    background-color: #f2f2f2; /* Soft beige tone */
}

.custom-image {
    flex: 1;
    max-width: 50%;
}

.custom-image img {
    width: 100%;
    height: auto;
    border-radius: 10px;
}

.custom-content {
    flex: 1;
    max-width: 45%;
    padding: 20px;
}

.custom-content h2 {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.custom-content ul {
    list-style-type: disc;
    padding-left: 20px;
    margin-bottom: 20px;
    color: #555;
}

.custom-content p {
    font-size: 16px;
    color: #555;
    margin-bottom: 15px;
}

    .talk, .customize_home, .plan_design {
        display: inline-block;
        background-color: #1b282a;
        color: white;
        padding: 12px 24px;
        border-radius: 5px;
        font-size: 16px;
        text-decoration: none;
        transition: 0.3s ease;
        text-align: center;
    }

    .plan_design:hover {
        background-color: rgb(66, 119, 121);
    }

    .talk:hover {
        background-color: rgb(66, 119, 121);
    }
    .customize_home:hover {
        background-color: rgb(66, 119, 121);
    }

@media (max-width: 768px) {
    .custom-section {
        flex-direction: column;
        text-align: center;
        padding: 40px 5%;
    }

    .custom-image, .custom-content {
        max-width: 100%;
    }

    .custom-content {
        padding: 20px 0;
    }
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
        <a href="#"><img src="img/interior.png" alt="Interior Solutions Logo"></a>
    </div>
    <nav>
        <a href="#" class="active">Home</a>
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
    <!-- Slider as Hero Section -->
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide" style="background-image: url('img/dashboard1.webp');">
                <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Welcome to Interior Solutions</h1>
                        <p>Feel free to browse our shop and choose what you like for your home.</p>
                        <a href="bedroom.php" class="hero-btn">Learn More</a>
                    </div>
                </div>
            <!-- Slide 2 -->
            <div class="swiper-slide" style="background-image: url('img/dashboard1.jpg');">
                <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>100% Customised Design</h1>
                        <p>Kitchen | Bedroom | Living Room | Dining Room</p>
                        <a href="customize_interiors.php" class="hero-btn">Get Started</a>
                    </div>
                </div>
            <!-- Slide 3 -->
            <div class="swiper-slide" style="background-image: url('img/dashboard2.jpg');">
                <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Pay First 20%</h1>
                        <p>Start designing by paying just 20%, and our team will contact you.</p>
                        <a href="island_Kitchen.php" class="hero-btn">Book Now</a>
                    </div>
                </div>
            <!-- Slide 4 -->
            <div class="swiper-slide" style="background-image: url('img/dashboard4.webp');">
                <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Projects Across Karnataka</h1>
                        <p>Timely project completion with expert craftsmanship.</p>
                        <a href="about_us.php" class="hero-btn">Explore Now</a>
                    </div>
                </div>
            <!-- Slide 5 -->
            <div class="swiper-slide" style="background-image: url('img/dashboard5.jpg');">
                <div class="overlay"></div>
                    <div class="hero-content">
                        <h1>Start Your Design</h1>
                        <p>Begin something extraordinary today.</p>
                        <a href="design_and_build.php" class="hero-btn">Start Today</a>
                    </div>
                </div>
            </div>
            <!-- Pagination & Navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    <div class="custom-made">
        <h1>PROFESSIONAL HOME INTERIOR DESIGN COMPANY</h1>
            <div class="co-circle">
                <div class="circle-container">
                    <div class="circle">SINCE<br>2025</div>
                </div>

                <div class="circle-container">
                    <div class="circle">PREMIUM<br>Materials</div>
                </div>

                <div class="circle-container">
                    <div class="circle">10 YEARS<br>Warranty</div>
                </div>

                <div class="circle-container">
                    <div class="circle">COMPLETION<br>40 Working Days</div>
                </div>

                <div class="circle-container">
                    <div class="circle">PROJECTS<br>300 Per Month</div>
                </div>

                <div class="circle-container">
                    <div class="circle">LIFELONG<br>Service Support</div>
                </div>
            </div>
    </div>

    <div class="spotlight">
        <h2>In the Spotlight</h2>
        <div class="products">
            <div class="product">
                <img src="img/dashboard1.jpg" alt="Product 1">
                <div class="info">
                    <h3>LCD Display Unit</h3>
                    <p>LCD Display Unit will be a centre of attraction in any living room when it is beautifully designed and made in theme matching the whole interiors.</p>
                    <div class="price"><a href="LCD_display_unit.php" class="btn product">Shop Now</a></div>
                </div>
            </div>
            <div class="product">
                <img src="img/dashboard2.jpg" alt="Product 2">
                <div class="info">
                    <h3>Chairs</h3>
                    <p>Interior solutions can give you tailor-made chairs to complement your living rooms with the contemporary flourish you always dreamed of.</p>
                    <div class="price"><a href="chairs.php" class="btn product">Shop Now</a></div>
                </div>
            </div>
            <div class="product">
                <img src="https://images.livspace-cdn.com/w:3840/plain/https://d3gq2merok8n5r.cloudfront.net/abhinav/ond-1634120396-Obfdc/ond-2024-1727950725-vfT46/living-1728890772-3eAJ0/living-room-2-1730103654-KJKlz.jpg" alt="Product 3">
                <div class="info">
                    <h3>Sofas</h3>
                    <p>Interior Solutions can either make or buy a suitable sofa set for your living room as part of the interior works contract.</p>
                    <div class="price"><a href="sofas.php" class="btn product">Shop Now</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="custom-made">
        <h1>WHAT WE DO</h1>
        <div class="gallery">
            <div class="gallery-item kitchen">
                <a href="kitchen.php">
                    <img src="img/kitchen.jpg" alt="Kitchen">
                </a>
                <div class="caption">KITCHEN</div>
            </div>
            <div class="gallery-item">
                <a href="bedroom.php">
                    <img src="img/bedroom.jpg" alt="Kitchen">
                </a>
                <div class="caption">BEDROOM</div>
            </div>
            <div class="gallery-item">
                <a href="dining.php">
                    <img src="img/dining.jpg" alt="Kitchen">
                </a>
                <div class="caption">DINING</div>
            </div>
            <div class="gallery-item">
                <a href="living.php">
                    <img src="img/living.jpg" alt="Kitchen">
                </a>
                <div class="caption">LIVING</div>
            </div>
            <div class="gallery-item kids-room">
                <a href="kids_room.php">
                    <img src="img/kidsroom1.jpg" alt="Kitchen">
                </a>
                <div class="caption">KIDS ROOM</div>
            </div>
        </div>
        <a class="plan_design" onclick="openPlanForm()">Talk to Our Design Consultant</a>
    </div>
    <div class="custom-made">
        <h1>PROJECT COMPLETION IN 40 WORKING DAYS*</h1>
        <div class="co-circle1">
            <!-- 1st circle -->
            <div class="circle-container1">
              <div class="circle-text-wrapper">
                <div class="circle1">
                  <img src="https://dlifeinteriors.com/wp-content/uploads/2023/06/meeting.svg" 
                       width="75" height="71" alt="Meeting">
                </div>
                <p class="circle-title">Talk to our Interior Designer<br>
                  & Get an Estimate</p>
              </div>
              <svg class="arrow" viewBox="0 0 50 20">
                <path d="M5 10h40M35 5l10 5-10 5" />
              </svg>
            </div>
        
            <!-- 2nd circle -->
            <div class="circle-container1">
              <div class="circle-text-wrapper">
                <div class="circle1">
                  <img src="https://dlifeinteriors.com/wp-content/uploads/2023/06/approved.svg" 
                       width="75" height="71" alt="Approved">
                </div>
                <p class="circle-title">Detailed Drawing<br>
                  and Approval</p>
              </div>
              <svg class="arrow" viewBox="0 0 50 20">
                <path d="M5 10h40M35 5l10 5-10 5" />
              </svg>
            </div>
        
            <!-- 3rd circle -->
            <div class="circle-container1">
              <div class="circle-text-wrapper">
                <div class="circle1">
                  <img src="https://dlifeinteriors.com/wp-content/uploads/2023/06/production.svg" 
                       width="75" height="71" alt="Production">
                </div>
                <p class="circle-title">Production at Own<br>
                  Factories</p>
              </div>
              <svg class="arrow" viewBox="0 0 50 20">
                <path d="M5 10h40M35 5l10 5-10 5" />
              </svg>
            </div>
        
            <!-- 4th circle -->
            <div class="circle-container1">
              <div class="circle-text-wrapper">
                <div class="circle1">
                  <img src="https://dlifeinteriors.com/wp-content/uploads/2023/06/truck.svg" 
                       width="75" height="71" alt="Delivery">
                </div>
                <p class="circle-title">Material Delivery<br>
                  & Execution</p>
              </div>
              <svg class="arrow" viewBox="0 0 50 20">
                <path d="M5 10h40M35 5l10 5-10 5" />
              </svg>
            </div>
        
            <!-- 5th circle -->
            <div class="circle-container1">
              <div class="circle-text-wrapper">
                <div class="circle1">
                  <img src="https://dlifeinteriors.com/wp-content/uploads/2023/06/deal.svg" 
                       width="75" height="71" alt="Handover">
                </div>
                <p class="circle-title">On Time Project<br>
                  Hand Over</p>
              </div>
              <!-- The last arrow is removed via JavaScript below -->
              <svg class="arrow" viewBox="0 0 50 20">
                <path d="M5 10h40M35 5l10 5-10 5" />
              </svg>
            </div>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script>
        // First animation for the .circle elements (first section)
        const circlesMain = document.querySelectorAll('.circle');
        let currentIndexMain = 0;
        setInterval(() => {
            circlesMain.forEach(circle => {
                circle.style.backgroundColor = '';
                circle.style.color = '#000';
            });
            circlesMain[currentIndexMain].style.backgroundColor = '#000';
            circlesMain[currentIndexMain].style.color = '#fff';
            currentIndexMain = (currentIndexMain + 1) % circlesMain.length;
        }, 2000);

        // Second animation for the .circle1 elements (second section)
        const circles1 = document.querySelectorAll('.circle1');
        let currentIndex1 = 0;
        setInterval(() => {
            circles1.forEach(circle => {
                circle.style.backgroundColor = '';
                circle.style.color = '#000';
                const img = circle.querySelector('img');
                if(img) {
                    img.style.filter = 'none';
                }
            });
            circles1[currentIndex1].style.backgroundColor = '#000';
            circles1[currentIndex1].style.color = '#fff';
            const currentImg = circles1[currentIndex1].querySelector('img');
            if(currentImg) {
                currentImg.style.filter = 'invert(1)';
            }
            currentIndex1 = (currentIndex1 + 1) % circles1.length;
        }, 2000);

        // Remove the last arrow from the last circle-container1
        const circleContainers1 = document.querySelectorAll('.circle-container1');
        if (circleContainers1.length > 0) {
            const lastContainer = circleContainers1[circleContainers1.length - 1];
            const lastArrow = lastContainer.querySelector('.arrow');
        if (lastArrow) {
            lastArrow.remove();
        }
        }
        var swiper = new Swiper(".hero-slider", {
            loop: true,
            autoplay: { delay: 3000 },
            pagination: { el: ".swiper-pagination", clickable: true },
            navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }
        });
    </script>

    <div class="custom-section section-two">
    <div class="custom-content">
        <h2>Contemporary Home Interior Designers And Contractors In India</h2>
        <p>Interior Solutions is the largest home interior designers in India with experience centres in Navi Mumbai, Hyderabad, Bangalore, Mysore, Kerala, Pune, Chennai, Nagercoil, Madurai, Coimbatore & Mangalore with more than 20 years of experience, 26 showrooms, modern factories, and a team of 1400 employees. We are professional, contemporary interior designers and contractors with capacity to hand over 300 projects every month. We ensure client satisfaction through quality products and systematic working.</p>
        <p>As the most renowned contemporary interior designers, we design and build beautiful living space within an apartment, group villa or independent villa, using our vast experience and creativity that will delight you, your family and visitors. Customize modular kitchen, bedroom, living and dining room furniture as per requirement and measurement of exact space with the help of the best interior design company.</p>
    </div>
    <div class="custom-image">
        <img src="img/home.jpg" alt="Personalized Home Interior">
    </div>
    </div>
    <div class="custom-section section-one">
    <div class="custom-image">
        <img src="img/home2.jpg" alt="Custom Home Interior">
    </div>
    <div class="custom-content">
        <h2>CUSTOM-MADE HOME INTERIORS</h2>
        <p>Since 2004, we have been transforming the essence of home interiors across Navi Mumbai, Hyderabad, Bangalore, Mysore, Kerala, Pune, Chennai, Nagercoil, Coimbatore, Madurai and Mangalore. Our expertise goes beyond aesthetics to include thoughtful designs that reflect style and functionality. Our dedicated team of interior designers understands the need for space and functionality, and offers customers exactly what they need. We provide complete furnishing for beautiful home interiors including modular kitchen furnishing, living and dining, and bedroom interiors to help bring your dream to life. If you would like to find out more about the interior solutions we offer then just contact us, and our designers will be in touch.</p>
        <a class="talk" onclick="openTalkForm()">Book a Free Consultation</a>
    </div>
    </div>
    <center>
    <iframe width="1400" height="715" src="https://www.youtube.com/embed/HohSXHPC5-c?si=9Kz0Q88O7_r2kRdl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </center>
    <div class="custom-section section-two">
    <div class="custom-content">
        <h2>LARGE MODULAR FURNITURE FACTORIES</h2>
        <p>At Interior Solutions, we believe in the design and manufacture of high-quality furniture pieces, which are truly original. We have a 1,25,000 sq ft Own Factory Space in 5 acres of land which is one of the largest modular furniture factories in India equipped with state-of-the-art German machinery to meet today’s furnishing trends. Our factory is well provisioned for creating bespoke furniture solutions. We design, build, and create interiors that bring joy to our clients for the years to come and for that, we have an excellent team who take different quality checks on our products regardless of its scale or complexity. The thread that combines our furniture pieces is bringing contemporary design solutions with strong commitment to quality.</p>
        <p>Over the years we’ve worked with thousands of clients and with a strong bias to create the extraordinary, all our products are equally stunning, functional, and focused. We are always striving to push boundaries and our production facilities ensure that we deliver the best of the product lines to suit any financial budget with on-time deliveries. We hire the most passionate individuals, our managers, supervisors, and technicians, in each process to style your dream home. Our extensive knowledge, high professionalism and use of the most modern technologies collaborated with leading designers in home interior design is the key strength which allows us to craft the best results and quality products that inspire people</p>
        <a class="customize_home" onclick="openCustomizeForm()">Contact for Customized Home Interiors</a>
    </div>
    <div class="custom-image">
        <img src="img/home3.jpg" alt="Personalized Home Interior">
    </div>
    </div>
    <!-- Talk to Expert Popup -->
    <div class="popup-overlay" id="popupForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Book a Free Consultation</h2>
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

    <!-- Planning Popup -->
    <div class="popup-overlay" id="popupPlanningForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Talk to Our Design Consultant</h2>
                <button class="close-btn" onclick="closeForm('popupPlanningForm')">×</button>
            </div>
            <hr>
            <p>Please fill out the enquiry below and we will get back to you as soon as possible</p>
            <form id="enquiryForm" onsubmit="submitForm(event, 'plan_design')">
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

    <!-- Customize Popup -->
    <div class="popup-overlay" id="popupCustomizeForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Contact for Customized Home Interiors</h2>
                <button class="close-btn" onclick="closeForm('popupCustomizeForm')">×</button>
            </div>
            <hr>
            <p>Please fill out the enquiry below and we will get back to you as soon as possible</p>
            <form id="enquiryCustomizeForm" onsubmit="submitForm(event, 'customize_home')">
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
