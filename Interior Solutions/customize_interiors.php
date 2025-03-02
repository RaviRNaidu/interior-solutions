<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customize Interiors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
         * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
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

        .logo img {
            height: 50px;
            object-fit: cover;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-evenly;
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

        .logout-btn {
            background-color:rgb(27, 40, 42);
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background-color:rgb(66, 119, 121);
        }

        nav a.active {
            font-weight: bold;
            text-decoration: underline;
        }
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: url('img/customize.jpg') no-repeat center center/cover;
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
            width: 800px;
        }

        .hero p {
            font-size: 32px;
            margin-bottom: 20px;
        }

/* First Section: Custom-Made Home Interiors */
.custom-made {
    text-align: center;
    padding: 40px 20px;
    background-color: #f9f9f9;
}

.custom-made h1 {
    font-size: 32px;
    margin-bottom: 20px;
}

.interior-links {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.interior-item {
    position: relative;
    display: inline-block;
    text-align: center;
    transition: transform 0.3s ease;
}

.interior-item img {
    width: 200px;
    height: 150px;
    border-radius: 10px;
    transition: opacity 0.3s ease;
}

.interior-item span {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(0, 0, 0, 0.6);
    color: white;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 16px;
}

.interior-item:hover {
    transform: scale(1.05);
}

.interior-item:hover img {
    opacity: 0.7;
}

.custom-section {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 60px 10%;
}

.section-one {
    background-color: #f2f2f2; /* Soft beige tone */
}

.section-two {
    background-color: #f9f9f9; /* Light grayish tone for contrast */
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

.custom-btn {
    display: inline-block;
    background-color: rgb(27, 40, 42);
    color: #fff;
    padding: 12px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.custom-btn:hover {
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
        <a href="dashboard.php"><img src="img/interior.png" alt="Interior Solutions Logo"></a>
    </div>
        <nav>
            <a href="dashboard.php">Home</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">What We Do</a>
                <ul class="dropdown-menu">
                    <li><a href="customize_interiors.php" class="active">Customized Interiors</a></li>
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
                    <li><a href="living.php">Living Room</a></li>
                    <li><a href="decorative_units.php">Decorative Units</a></li>
                    <li><a href="kids_room.php">Kids Room</a></li>
                </ul>
            </div>
            <a href="gallery.php">Gallery</a>
            <a href="contact.php">Contact</a>
        </nav>
    <a href="logout.php" class="logout-btn">Logout</a>
    </header>
    <div class="hero">
        <div class="text">
            <h1>Long-lasting Home Interiors</h1>
            <p>Tailored to Fulfill Your Needs</p>
        </div>
    </div>
    <!-- First Section: Custom-Made Home Interiors with Navigation Links -->
    <section class="custom-made">
        <h1>Custom-Made Home Interiors</h1>
        <p>“Made for you” may be an accurate phrase to express what we do in interiors. We have been designing and executing exquisite home interiors since 2004. Custom-made interior is the best way to ensure that modular kitchen, wardrobes and other furniture perfectly fits to the spaces. Our interior designers possess impeccable ability to understand client’s requirements and provide the best space planning for a house or flat.</p>
        <p>Interior Solutions fully equipped modular kitchen is distinct with its unique design and most modern features. We plan and make contemporary style furniture for bedrooms, living and dining rooms as well. Innovative ideas, creative designs and ability to deliver the promises on time enables us to retain the leadership in this field.</p>
        <div class="interior-links">
            <a href="living.php" class="interior-item">
                <img src="img/living.jpg" alt="Living Room">
                <span>Living</span>
            </a>
            <a href="bedroom.php" class="interior-item">
                <img src="img/bedroom.jpg" alt="Bedroom">
                <span>Bedroom</span>
            </a>
            <a href="kitchen.php" class="interior-item">
                <img src="img/kitchen.jpg" alt="Kitchen">
                <span>Kitchen</span>
            </a>
            <a href="dining.php" class="interior-item">
                <img src="img/dining.jpg" alt="Dining">
                <span>Dining</span>
            </a>
        </div>
    </section>

    <div class="custom-section section-one">
    <div class="custom-image">
        <img src="img/customize1.jpg" alt="Custom Home Interior">
    </div>
    <div class="custom-content">
        <h2>Why Customized Home Interiors?</h2>
        <ul>
            <li>Creating rather than accepting what is available ensures complete satisfaction of users.</li>
            <li>Clients have the opportunity to choose materials for making furniture and decor.</li>
            <li>Customizations are as per requirements of each client and a design theme.</li>
            <li>Customize furniture as per design, measuring actual space at site.</li>
            <li>Interaction between designer and client at each phase till finalization ensures scope for improvement to meet the objectives of customized home interiors.</li>
            <li>Clients get to select accessories and fittings and create cabinets accordingly.</li>
            <li>Enhance storage capabilities and make the most of difficult spaces.</li>
            <li>Enables you to have furniture with a suitable color that blends with your color scheme.</li>
            <li>Plan and modify interior works as per budget. Clients get to study the estimate and drawings and alter plans during the design stage as per budget.</li>
        </ul>
        <a href="custom-interiors.html" class="custom-btn">Get 100% Customized Interiors</a>
    </div>
</div>

<div class="custom-section section-two">
    <div class="custom-content">
        <h2>Give a Personalized Touch to Your Dream Home</h2>
        <p>We bring customization to your fingertips, from the initial consultation through the end process; our team of interior designers will provide you with all the support and advice so you get a personalized touch in your dream home. Over the years, we have worked with 10000+ clients and we provide interior design and furnishing services, which are more than just about styles and finishes.</p>
        <p>Interior Solutions provides you a fully bespoke service on home interior design to your brief. All our products are custom made from the finest materials. With respect for the past and an eye on the future, our high level of machinery and quality checks help you realize your dream home interiors with fully customized products and quality.</p>
        <a href="expert-designer.html" class="custom-btn">Reach Our Expert Designer</a>
    </div>
    <div class="custom-image">
        <img src="img/customize2.jpg" alt="Personalized Home Interior">
    </div>
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
<div class="floating-buttons">
    <a href="https://wa.me/7204941908" class="whatsapp-button" target="_blank">
        <i class="fab fa-whatsapp"></i> WhatsApp
    </a>
    <a href="mailto:contact@company.com" class="mail-button">
        <i class="fas fa-envelope"></i> Send Mail
    </a>
    <a href="#" class="estimate-button">Free Estimate</a>
</div>
</footer>
</body>
</html>