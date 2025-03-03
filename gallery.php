<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
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
        /* Heading */
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
        <a href="gallery.php" class="active">Gallery</a>
        <a href="contact.php">Contact</a>
    </nav>
    <a href="logout.php" class="logout-btn">Logout</a>
    </header>
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
            <img src="https://static.vecteezy.com/system/resources/previews/029/806/370/non_2x/home-front-and-cute-boy-vector.jpg" alt="Gallery Image 1">
            <div class="info">
                <h3>VIDEO<br><b>GALLERY</b></h3>
                <p>If you are looking for clearly laid out answers and realistic inspirations to your questions over interior design, and design process, andhow much our clients love our works, take the time to understand why we are the best for your deram home.</p>
                <a href="gallery.html">View Now</a>
            </div>
        </div>
         <!-- second Gallery Item -->
         <div class="project-box">
            <img src="https://www.hunarcourses.com/blog/wp-content/uploads/2021/04/home-interior-design-ideas.jpg" alt="Gallery Image 1">
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
            <img src="https://asset.skoiy.com/9b80a6f781ff336f/yrwwqpnyb7ys.jpg?w=970&q=90" alt="Gallery Image 2">
            <div class="info">
                <h3>PROJECT-WISE<br><b>GALLERY</b></h3>
                <p>We have designed interiors for modern family homes to luxury residential projects across South India.From initial consultation to a completely finished home, we provide our clients with the best possible interior designs and ideas that are comfortable, affordable,and livable. </p>
                <a href="gallery.html">View Now</a> 
                </div>
        </div>
    </div>
    </div>
    </div>
<br>
<br>
<h2>INTERIOR<br><b>GALLERY</h2>
<div id="gallery" class="gallery">
    <img src="https://media.designcafe.com/wp-content/uploads/2022/07/29185240/industrial-rustic-living-room-in-earthy-tones.jpg" alt="Residential Interior Design" height="300" width="350">  
    <img src="https://www.hunarcourses.com/blog/wp-content/uploads/2021/04/home-interior-design-ideas.jpg" alt="Gallery Image 1" height="300" width="350">
           <img src="https://assets.architecturaldigest.in/photos/63c94f218df6b9fdb924d9b1/16:9/w_2560%2Cc_limit/220615-KBWID_Highland_009.jpg" alt="Gallery Image 2" height="300" width="350">
           <img src="https://images.livspace-cdn.com/w:3840/plain/https://d3gq2merok8n5r.cloudfront.net/abhinav/ond-1634120396-Obfdc/ond-2024-1727950725-vfT46/living-1728890772-3eAJ0/lr-2-1733655866-hqslU.jpg" alt="Gallery Image 3" height="300" width="350">
           <img src="https://images.livspace-cdn.com/w:3840/plain/https://d3gq2merok8n5r.cloudfront.net/abhinav/ond-1634120396-Obfdc/ond-2024-1727950725-vfT46/living-1728890772-3eAJ0/lr-2-1733655866-hqslU.jpg" alt="Gallery Image 4" height="300" width="350">
           <img src="https://evolveindia.co/wp-content/uploads/2021/07/1_The-Wooden-Rhapsody-Modern-Bedroom-Interior-Design.jpg" alt="Gallery Image 5" height="300" width="350">
           <img src="https://images.livspace-cdn.com/w:3840/plain/https://d3gq2merok8n5r.cloudfront.net/abhinav/ond-1634120396-Obfdc/ond-2024-1727950725-vfT46/mbr-1728896086-T3mTU/mbr-3-1733657278-mixoT.jpg" alt="Gallery Image 6" height="300" width="350">
           <img src="https://bonito.in/wp-content/uploads/2022/01/Top-7-Master-Bed-Room-10.jpg" alt="Gallery Image 7" height="300" width="350">
           <img src="https://goodhomes.wwmindia.com/content/2022/feb/living-room-is-most-attended-in-a-home.jpg" alt="Gallery Image 8" height="300" width="350">
           <img src="https://acharyainteriors.com/uploads/tenant/acharyainterior/960X720-F.webp" alt="Gallery Image 9" height="300" width="350">
           <img src="https://media.istockphoto.com/id/1357529222/photo/3d-rendering-of-a-dining-area-in-modern-kitchen.jpg?s=612x612&w=0&k=20&c=TkxsGMij1SYk3EJjFnPEmsn7zlRZuAjc-EhrnfmkB9I=" alt="Gallery Image 10" height="300" width="350">
           <img src="https://www.ikea.com/ext/ingkadam/m/4567161a2797d415/original/PH201908.jpg?f=xxxs?imwidth=300" alt="Gallery Image 11" height="300" width="350">
           <img src="https://hgtvhome.sndimg.com/content/dam/images/hgtv/fullset/2023/7/19/3/DOTY2023_Dramatic-Before-And-Afters_Hidden-Hills-11.jpg.rend.hgtvcom.1280.960.85.suffix/1689786863909.webp" alt="Gallery Image 12" height="300" width="350">
           <img src="https://tasainteriordesigner.com/wp-content/uploads/2024/12/modular-kitchen-design-8.jpeg" alt="Gallery Image 13" height="300" width="350">
           <img src="https://goodhomes.wwmindia.com/content/2022/apr/simple-kitchen-design-by-pta-designs.jpg" alt="Gallery Image 14" height="300" width="350">
           <img src="https://www.decorpot.com/images/blogimage2131055678Light-and-Neutral-Colors-for-a-Calm-living-room.jpg" alt="Gallery Image 15" height="300" width="350">

<br>
<br>
<br>
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