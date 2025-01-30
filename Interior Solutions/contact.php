<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
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
            background-color: #f5f5f5;
            padding: 15px 30px;
        }

        .logo img {
            height: 50px;
            object-fit: cover;
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            text-decoration: none;
            color: #444;
            font-weight: 500;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 4px;
        }

        nav a:hover {
            background-color: #ddd;
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
            background: url('img/contact.jpg') no-repeat center center/cover;
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
        .contact-container {
            padding: 50px 20px;
            display: flex;
            gap: 40px;
            flex-wrap: wrap;
        }

        .contact-form {
            flex: 1;
            background: #f5f5f5;
            padding: 20px;
            border-radius: 8px;
        }

        .contact-form h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .contact-form input, 
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        .contact-form button {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #555;
        }

        .contact-details {
            flex: 1;
        }

        .contact-details h3 {
            margin-bottom: 20px;
            color: #333;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .contact-item i {
            font-size: 20px;
            color: #333;
            margin-right: 15px;
        }

        .contact-item p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        footer {
    background-color: #f5f5f5;
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

.estimate-button {
    background-color: #28a745;
    font-weight: bold;
}

.estimate-button:hover {
    background-color: #218838;
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
        <a href="about_us.php" >About Us</a>
        <a href="what_we_do.php">What We Do</a>
        <a href="product.php">Product</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php" class="active">Contact</a>
    </nav>
    <a href="logout.php" class="logout-btn">Logout</a>
    </header>
    <div class="hero">
        <div class="text">
            <h1>LEADING INTERIOR</h1>
            <p>Company In India</p>
        </div>
    </div>
    <section class="contact-container">
    <div class="contact-form">
        <h3>Get in Touch</h3>
        <form>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" rows="5" placeholder="Your Message"></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="contact-details">
        <h3>Contact Details</h3>
        <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <p>123 Interior Street, Home City, Country</p>
        </div>
        <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <p>contact@interiorsolutions.com</p>
        </div>
        <div class="contact-item">
            <i class="fas fa-phone-alt"></i>
            <p>+1 123 456 7890</p>
        </div>
    </div>
</section>
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-3 col-sm-6">
                    <h4>BENGALURU</h4>
                    <p>HSR Layout<br>+91 999 551 77 77</p>
                    <p>Yelahanka<br>+91 956 723 33 33</p>
                    <p>Whitefield<br>+91 949 760 22 22</p>
                </div>
                <!-- Column 2 -->
                <div class="col-md-3 col-sm-6">
                    <h4>MYSURU</h4>
                    <p>BM Habitat Mall<br>+91 938 342 33 33</p>
                    <h4>MANGALURU</h4>
                    <p>Bejai<br>+91 949 606 22 22</p>
                </div>
                <!-- Column 3 -->
                <div class="col-md-3 col-sm-6">
                    <h4>HYDERABAD</h4>
                    <p>Banjara Hills<br>+91 949 508 77 77</p>
                    <p>Kompally<br>+91 807 831 22 22</p>
                    <h4>MARKETING OFFICE</h4>
                    <p>UAE<br>+971 56 665 64 14</p>
                </div>
                <!-- Column 4 -->
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
        <!-- Footer Logo and Copyright -->
        <div class="d-flex align-items-center">
            <img src="img/interior.png" alt="Footer Logo" class="footer-logo">
            <p>&copy; 2025 Interior Solutions. All Rights Reserved.</p>
        </div>

        <!-- Social Media Links -->
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
    <footer>
    <!-- Floating Buttons -->
<div class="floating-buttons">
    <a href="https://wa.me/9999999999" class="whatsapp-button" target="_blank">
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

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style> -->
        
        
    <!-- </style>
</head>
<body>
<header>
    <div class="logo">
        <a href="dashboard.php"><img src="img/interior.png" alt="Interior Solutions Logo"></a>
    </div>
    <nav>
        <a href="dashboard.php">Home</a>
        <a href="about_us.php">About Us</a>
        <a href="what_we_do.php">What We Do</a>
        <a href="product.php">Product</a>
        <a href="gallery.php">Gallery</a>
        <a href="contact.php" class="active">Contact</a>
    </nav>
</header>

<section class="hero">
    <div class="text">
        <h2>Contact Us</h2>
        <p>Home > Contact Page</p>
    </div>
</section>

<section class="contact-container">
    <div class="contact-form">
        <h3>Get in Touch</h3>
        <form>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="text" name="subject" placeholder="Subject">
            <textarea name="message" rows="5" placeholder="Your Message"></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="contact-details">
        <h3>Contact Details</h3>
        <div class="contact-item">
            <i class="fas fa-map-marker-alt"></i>
            <p>123 Interior Street, Home City, Country</p>
        </div>
        <div class="contact-item">
            <i class="fas fa-envelope"></i>
            <p>contact@interiorsolutions.com</p>
        </div>
        <div class="contact-item">
            <i class="fas fa-phone-alt"></i>
            <p>+1 123 456 7890</p>
        </div>
    </div>
</section>

<footer>
    <p>&copy; 2021 Home Interior. All Rights Reserved.</p>
</footer>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html> -->

        



