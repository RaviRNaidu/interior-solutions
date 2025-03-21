<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dining</title>
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
            background: url('img/dining.jpg') no-repeat center center/cover;
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
                    <li><a href="dining.php" class="active">Dining Room</a></li>
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
            <h1>Customized Dining Room</h1>
            <p>For Your Modern Lifestyle</p>
        </div>
    </div>
    <div class="intro-section">
        <h2>Custom-Made Dining Room</h2>
        <p>People often have a tendency to purchase dining room furniture and other products separately from the ready-made furniture shop. But with D’LIFE you have an option to get dining room furniture such as table, chairs and crockery shelves in matching designs and color. By custom design and making, dining room interior design can be in perfect combination with modular kitchen. D'LIFE provides you with a comfortable design that matches your requirements. A suitable bar counter can be designed conveniently within the space available or the wash counter can be augmented by adding storage in matching colour themes. Take a look at some of our products for your dining room in this page to customize and include in your home interiors package. We have an endless variety of dining room interior design decors to give your dining room the makeover it deserves with gorgeous and beautiful updates for walls, lighting, and exclusive furniture. This facility of custom design and implementation of dining rooms in combination with other rooms is available in our branches in Navi Mumbai, Pune, Hyderabad, Bangalore, Mysore, Kerala, Chennai, Nagercoil, Coimbatore, Madurai & Mangalore.</p>
    </div>
    <div class="content-section">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>BAR COUNTER</h2>
                <p>Most of the modern houses have a bar counter unit assembled at the dining room itself. It not only serves as a bar counter unit, but also acts as a prestigious decorative unit too. Avail the bar counter units to be assembled anywhere in Kerala, Bangalore, Mysore, Hyderabad, Coimbatore, Chennai, Mangalore and Nagercoil from D`LIFE Home Interiors.</p>
                <a href="bar_counter.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/barcounter.png" alt="BAR COUNTER 1">
                <img src="img/barcounter1.jpg" alt="BAR COUNTER 2">
            </div>
        </div>
    </div>
    <div class="content-section2">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Crockery Shelf</h2>
                <p>A crockery shelf enables you to arrange your crockery items in a prestigious way. Dining rooms will be beautified when you have a customized crockery shelf in it. Choose from the wide range of crockery shelf designs from D`LIFE.</p>
                <a href="crockery_shelf.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/crockery.jpg" alt="Crockery Shelf 1">
                <img src="img/crockery1.png" alt="Crockery Shelf 2">
            </div>
        </div>
    </div>
    <div class="content-section">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Dining Chair</h2>
                <p>Dining chairs of the most modern type are custom-designed and made to suit the dining table set. Complete home interiors in unique style would need attention to even the small things. An alternative option is to go for a ready-made dining table and chairs set. But that may not match with the rest of the works that lead to imperfection. With D`LIFE customized dining chairs it is sure to bring comfort and style in perfect combination with the rest of the furnishing.</p>
                <a href="dining_chair.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/chair.jpg" alt="Dining Chair">
                <img src="img/chair1.jpg" alt="Dining Chair">
            </div>
        </div>
    </div>
    <div class="content-section2">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Dining Table</h2>
                <p>As the dining table is a prominent piece of furniture for the daily use of family members, its style and durability is a matter of concern for all. D`LIFE makes suitable dining tables as part of home interior projects undertaken. Most modern styles can be integrated into the durable materials of laminated hardwood fiber board and glass. Ask for the available types of dining table or let us create something new for your house or flat.</p>
                <a href="dining_table.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/diningtable.jpg" alt="Dining Table">
                <img src="img/diningtable1.jpg" alt="Dining Table">
            </div>
        </div>
    </div>
    <div class="content-section">
        <div class="content-wrapper">
            <div class="text-content">
                <h2>Wash</h2>
                <p>A wash counter is an inevitable part of a dining room and when you can get it customized as per your needs and requirements it seems to be much more interesting. Make a wash counter unit that fits your space and keep your head straight while the guest arrives.</p>
                <a href="wash.php" class="view-more">View More</a>
            </div>
            <div class="image-gallery">
                <img src="img/wash.jpg" alt="Wash">
                <img src="img/wash1.jpg" alt="Wash">
            </div>
        </div>
    </div>
    <div class="intro-section">
        <button class="talk" onclick="openForm()">Talk to our interior designing experts</button>
    </div>

    <!-- Popup Form -->
    <div class="popup-overlay" id="popupForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Talk to our Interior designing expert</h2>
                <button class="close-btn" onclick="closeForm()">×</button>
            </div>
            <hr>
            <p>Please fill out the enquiry below and we will get back to you as soon as possible</p>
            <form id="enquiryForm">
                <input type="text" placeholder="Name" required>
                
                <div class="phone-input">
                    <select>
                        <option value="+91">🇮🇳 +91</option>
                        <option value="+1">🇺🇸 +1</option>
                        <option value="+44">🇬🇧 +44</option>
                        <option value="+61">🇦🇺 +61</option>
                    </select>
                    <input type="tel" placeholder="Contact Number" required>
                </div>

                <input type="email" placeholder="Email Address" required>
                <input type="text" placeholder="Project Location" required>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
    <script src="form.js"></script>
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