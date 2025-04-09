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
.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: url('img/project wise gallery.jpg') no-repeat center center/cover;
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
h2 {
    text-align: center;
    color: #333;
    }
.customer_gallery{
    padding:30px 20px;
    }
/* Ultra-Premium Gallery Container */
#galleries {
    display: flex;
    flex-direction: column;
    align-items: center; /* Centers content horizontally */
    justify-content: center; /* Centers content vertically */
    gap: 40px;
    max-width: 1400px;
    width: 100%;
    margin: auto;
    text-align: center;
}
    /* Ultra-Premium Gallery Card */
.gallery-container {
    display: flex;
    align-items: center;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 20px;
    padding: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
    transition: all 0.5s ease-in-out;
    border: 2px solid rgba(35, 33, 29, 0.3);
    position: relative;
    overflow: hidden;
}
.gallery-container:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(47, 46, 42, 0.2);
}
/* Static Image (Luxury Style) */
.static-img {
    flex: 0 0 auto;
    text-align: center;
    width: 350px;
    border-radius: 16px;
    overflow: hidden;
    position: relative;
}
.static-img img {
    width: 300px;
    border-radius: 4px;
    display: block;
}
.static-img img:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(7, 7, 7, 0.3);
}
/* Static Title */
.static-title {
    font-size: 1.4rem;
    color: #282622;
    text-align: center;
    margin-top: 20px;
    font-weight: 700;
    letter-spacing: 1.2px;
}
/* Ultra-Smooth Slider */
.slider {
    width: 1000px; /* Exactly 2 images x 350px */
    overflow: hidden;
    border-radius: 16px;
    position: relative;
    box-shadow: 0 10px 30px rgba(19, 19, 19, 0.2);
    border: 2px solid rgba(9, 9, 9, 0.3);
    transition: all 0.5s ease-in-out;
}
.slider:hover {
    border-color: #131211;
}
/* Slider Wrapper */
.slider-wrapper {
    display: flex;
    transition: transform 0.5s ease-in-out;
}
/* Slider Images */
.slider-wrapper img {
    width: 350px;
    flex-shrink: 0;
    border-radius: 16px;
    transition: transform 0.4s ease-in-out, box-shadow 0.4s ease-in-out;
}
.slider-wrapper img:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(18, 18, 17, 0.3);
}
/* Responsive Design */
    @media (max-width: 1100px) {
    .gallery-container {
    flex-direction: column;
    text-align: center;
    padding: 30px;
}
.static-img {
    width: 100%;
    }
.slider {
    width: 100%;
}
.slider-wrapper img {
    width: 48%;
      }
@media (max-width: 768px) {
    .gallery-container {
    padding: 25px;
}
.slider-wrapper img {
    width: 100%;
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
        <a href="gallery.php" class="active"> Gallery</a>
        <a href="contact.php">Contact</a>
    </nav>
    <a href="logout.php" class="logout-btn">Logout</a>
    </header>
    <div class="hero">
        <div class="text">
            <h1><strong>Timely Project Completion</h1></strong>
            <br>
            <p>Ensuring Satisfaction</p>
        </div>
    </div>
    <div class="customer_gallery"><br><br>
        <h1 style="text-align: center"></style>Completed Projects Across Karnataka</h1>
        <p>Since 2004, we have been designing interiors for modern and contemporary homes. From family homes to luxury residential projects, we deliver bespoke high end designs and interior design solutions across India. From concept to completion we create luxuriously sophisticated and elegant interiors that gives our client the confidence and the designer control which is always something we take great pride over. We understand each client is unique and every project is different and for that we have the most respected interior designers and decorators. Seeing our clients happiness at the service and products we offer, at a space transformed, knowing what their home makes them feel is what makes it so rewarding to us.</p>
</div>      
  <div id="galleries"></div>
  <script>
        const galleriesData = [
            {
                static: 'img/sanathan ns.jpg',
                slides: [
                    'img/sanathan.avif',
                    'img/punithbed.jpg',
                    'img/sanathliving.jpg',
                    'img/sanathdining.avif'
                ],
                title: 'Sanathan N S'
            },
            {
                static: 'img/punith.nc.jpg',
                slides: [
                    'img/punitkit.jpg',
                    'img/santhbed.webp',
                    'img/punilivi.jpg',
                    'img/punidining.jpg'
                ],
                title: 'Punith.N.C'
            },
            {
                static: 'img/swaroop.s.jpg',
                slides: [
                    'img/swasopkit.avif',
                    'img/swabed.jpg',
                    'img/swalivi.avif',
                    'img/swadining.jpeg'
                ],
                title: 'Swaroop.S'
            },
            {
                static: 'img/rohitr.jpg',
                slides: [
                    'img/rokit.jpg',
                    'img/robed.jpg',
                    'img/roliv.jpg',
                    'img/rodin.webp'
                ],
                title: 'Rohit'  
            },
            {
                static: 'img/arya.jpg',
                slides: [
                    'img/aryakit.jpeg',
                    'img/arbed.jpg',
                    'img/arliving.jpg', 
                    'img/ardining.jpg'
                ],
                title: 'Arya'
            },
            {
                static: 'img/pavann.jpg',
                slides: [
                    'img/pavkit.jpg',
                    'img/pavbed.jpg',
                    'img/pavliv.jpg',
                    'img/pavdin.jpg'
                ],
                title: 'Pavan.M'
            },
            {
                static: 'img/nandan.tr.jpg',
                slides: [
                    'img/nankit.jpg',
                    'img/nanbed.jpg',
                    'img/nanliving.jpg',
                    'img/nandining.avif'
                ],
                title: 'Nandan.T.R'
            }
        ];
 // Constants for slider settings
 const slideWidth = 350;
    const visibleCount = 2; // 2 images visible at once
    const slideInterval = 3000; // time in milliseconds
    const galleriesContainer = document.getElementById('galleries');
    galleriesData.forEach((galleryData, index) => {
      // Create gallery card
      const galleryDiv = document.createElement('div');
      galleryDiv.className = 'gallery-container';

      // Create static image section
      const staticDiv = document.createElement('div');
      staticDiv.className = 'static-img';

      const staticImg = document.createElement('img');
      staticImg.src = galleryData.static;
      staticImg.alt = 'Static Image ' + (index + 1);

      const staticTitle = document.createElement('p');
      staticTitle.className = 'static-title';
      staticTitle.textContent = galleryData.title;

      staticDiv.appendChild(staticImg);
      staticDiv.appendChild(staticTitle);

      // Create slider section
      const sliderDiv = document.createElement('div');
      sliderDiv.className = 'slider';
      const sliderWrapper = document.createElement('div');
      sliderWrapper.className = 'slider-wrapper';

      // Create slides
      galleryData.slides.forEach((slideSrc, slideIndex) => {
        const slideImg = document.createElement('img');
        slideImg.src = slideSrc;
        slideImg.alt = 'Gallery ' + (index + 1) + ' - Slide ' + (slideIndex + 1);
        sliderWrapper.appendChild(slideImg);
      });

      // Clone first "visibleCount" slides for seamless transition
      for (let i = 0; i < visibleCount; i++) {
        const clone = sliderWrapper.children[i].cloneNode(true);
        sliderWrapper.appendChild(clone);
      }

      sliderDiv.appendChild(sliderWrapper);
      galleryDiv.appendChild(staticDiv);
      galleryDiv.appendChild(sliderDiv);
      galleriesContainer.appendChild(galleryDiv);

      let currentIndex = 0;
      const totalSlides = galleryData.slides.length; // original number of slides

      // Use setInterval for continuous sliding
      setInterval(() => {
        currentIndex++;
        sliderWrapper.style.transition = 'transform 0.5s ease-in-out';
        sliderWrapper.style.transform = 'translateX(-' + (currentIndex * slideWidth) + 'px)';

        // Reset seamlessly after reaching the cloned slides
        if (currentIndex === totalSlides) {
          // Wait for the transition to complete
          sliderWrapper.addEventListener('transitionend', function resetTransition() {
            sliderWrapper.style.transition = 'none';
            sliderWrapper.style.transform = 'translateX(0)';
            currentIndex = 0;
            // Remove this event listener so it doesn't fire every time
            sliderWrapper.removeEventListener('transitionend', resetTransition);
          });
        }
      }, slideInterval);
    });
</script>
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
