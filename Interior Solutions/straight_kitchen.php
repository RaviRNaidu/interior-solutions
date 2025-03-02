<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Straight_Kitchen</title>
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

        /* Full-screen Hero Image */
        .hero img {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        /* Gallery Section */
        .gallery {
            text-align: center;
            padding: 50px 20px;
            background-color: #f2f2f2;
        }

        .gallery h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 10px;
        }

        .gallery p {
            font-size: 18px;
            color: #555;
            max-width: 900px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Image Grid */
        .image-grid {
            display: flex;
            justify-content: center;
            gap: 25px; /* Equal spacing between images */
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 40px auto 0; /* Padding above the images */
        }

        /* Image Box */
        .image-box {
            position: relative;
            display: block;
            border-radius: 10px;
            overflow: hidden;
            width: 30%; /* Set equal width */
            height: 280px; /* Set equal height */
        }

        .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Maintain aspect ratio */
            border-radius: 10px;
        }

        /* Title always visible */
        .image-box span {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            color: white;
            text-align: center;
            padding: 12px;
            font-size: 18px;
        }

        /* Hover Effect */
        .image-box:hover span {
            background: rgba(0, 0, 0, 0.8); /* Darker background on hover */
        }

        /* Load More Button */
        .load-more {
            margin-top: 30px;
            padding: 12px 20px;
            font-size: 16px;
            background-color: rgb(27, 40, 42);
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            align-self: flex-end; /* Push to the right */
        }

        .load-more-container {
            display: flex;
            justify-content: flex-end; /* Align to the right */
            width: 30%;
        }

        .load-more:hover {
            background-color: #427779;
        }

        /* Contact Section */
        .contact-section {
            background-color:#f9f9f9 ; /* White  #ffffff background for the first section */
            text-align: center;
            padding: 50px 20px;
        }

        .contact-btn {
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

        .contact-btn:hover {
            background-color: #427779;
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
            width: 440px;
            text-align: center;
            position: relative;
        }

        .popup-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .popup h2 {
            font-size: 20px;
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
                    <li><a href="kitchen.php" class="active">Kitchen</a></li>
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
    <!-- Full-screen image -->
    <section class="hero">
        <img src="img/straightkitchen.jpg" alt="Interior Design">
    </section>

    <!-- Scrollable Section -->
    <section class="gallery">
        <h2>Straight Kitchen</h2>
        <p>A big space can accommodate a straight kitchen with differences from commonly used styles. Best of the efforts are made by our team of interior designers to provide unique ideas and concepts in making modular kitchens to suit the space and match with the house. Glossy, mystic, blackcurrant, siam, moroccan, tanned etc are some of the sample designs under a straight kitchen that can be made and installed across India.</p>
        
        <div class="image-grid" id="imageGrid">
            <a href="page1.html" class="image-box"><img src="img/cario.jpg" alt="Cario"><span>Cario</span></a>
            <a href="page2.html" class="image-box"><img src="img/moroccan.jpg" alt="Moroccan"><span>Moroccan</span></a>
            <a href="page3.html" class="image-box"><img src="img/siam.jpg" alt="Siam"><span>Siam</span></a>
        </div>

        <button class="load-more" id="loadMore">Load More</button>
    </section>

    <!-- Contact Button -->
    <div class="contact-section">
        <button class="contact-btn" onclick="openForm()">Contact Our Interior Designer for Details</button>
    </div>

    <!-- Popup Form -->
    <div class="popup-overlay" id="popupForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Contact Our Interior Designer for Details</h2>
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

    <script>
        document.getElementById("loadMore").addEventListener("click", function() {
    const grid = document.getElementById("imageGrid");

    // List of images to be loaded in sequence
    const newImagesSet = [
        [
            { src: "img/mystic.jpg", alt: "Mystic", link: "page4.html" },
            { src: "img/blackcurrent.jpg", alt: "Blackcurrant", link: "page5.html" },
            { src: "img/mat.jpg", alt: "Mat", link: "page6.html" }
        ],
        [
            { src: "img/tanned.jpg", alt: "Tanned", link: "page7.html" },
            { src: "img/glossy.png", alt: "Glossy", link: "page8.html" }
        ]
    ];

    // Keep track of how many times the button is clicked
    if (!this.dataset.clickCount) {
        this.dataset.clickCount = "0";
    }

    let clickCount = parseInt(this.dataset.clickCount);
    
    if (clickCount < newImagesSet.length) {
        newImagesSet[clickCount].forEach(img => {
            const anchor = document.createElement("a");
            anchor.href = img.link;
            anchor.classList.add("image-box");
            anchor.innerHTML = `<img src="${img.src}" alt="${img.alt}"><span>${img.alt}</span>`;
            grid.appendChild(anchor);
        });

        this.dataset.clickCount = (clickCount + 1).toString();
    }

    // Hide the button after all images are loaded
    if (clickCount + 1 === newImagesSet.length) {
        this.style.display = "none";
    }
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