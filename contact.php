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
    margin: 10;
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
.nav a.active {
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
.cta-button {
    display: inline-block;
    background-color:rgb(4, 4, 4);
    color: #fff;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: bold;
}
.cta-button:hover {
    background-color:rgb(7, 7, 7);
}
         /* Contact Section */
.contact-section {
    padding:50px 20;
    background-color: #f5f5f5;
}
.section-title {
    text-align: center;
    font-size: 28px;
    margin-bottom: 20px;
    color:rgb(12, 12, 12);
}
.contact-container {
    padding: 50px 20px;
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
}
.heading{
    text-align: center;
    display:grid;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
    align-items: center;
}
.heading{
   padding:50px 20px;
    background-color: #f5f5f5;
}
.locations {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 20px;
}
.location-card {
    background: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    padding: 20px;
    max-width: 350px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.location-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}
.location-card h3 {
    font-size: 1.5rem;
    color: #007bff;
    margin-bottom: 10px;
}
.location-card p {
    font-size: 1rem;
    color: #555;
    margin: 5px 0;
}
.location-card a {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 15px;
    background:rgb(11, 12, 12);
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-weight: 500;
}
.location-card a:hover {
    background: #0056b3;
}
    /* Responsive Design */
    @media (max-width: 768px) {
    .locations {
    flex-direction: column;
    align-items: center;
    }
}
.contact-buttons {
    position: fixed;
    bottom: 20px;
    right: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.contact-buttons a {
    text-decoration: none;
    color: white;
    background-color: #5A189A;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    transition: 0.3s;
}
.contact-buttons a:hover {
    background-color: #3c0b70;
 }
.image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
 }
 .image-container img {
    width: 200px;
    height: auto;
    border-radius: 8px;
 }
    /* Modal Background */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}
    /* Modal Content - Centered */
.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    width: 350px;
    text-align: center;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
    position: relative;
}
    /* Close Button */
.close {
    position: absolute;
    right: 15px;
    top: 10px;
    font-size: 20px;
    cursor: pointer;
}
    /* Form Styling */
#contactForm {
    display: flex;
    flex-direction: column;
}
#contactForm input {
    margin: 10px 0;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
#contactForm button {
    background-color:rgb(12, 11, 10);
    color: white;
    padding: 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
#contactForm button:hover {
    background-color:rgb(17, 15, 14);
}
.contact-form {
    flex: 1;
    background: #f5f5f5;
    padding: 20px ;
    border-radius: 8px;
}
.contact-form h3 {
    margin-bottom: 20px;
    color: #333;
}
.contact-form label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}               
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
    text-align: center;
}
.contact-item i {
    font-size: 20px;
    color: #333;
    margin-right: 15px;
    text-align: center;
}
.contact-item p {
    margin: 0;
    font-size: 14px;
    color: #555;
    text-align: center;      
}
.review-box {
  background: white;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  width: 400px;
  margin: 30px auto; /* centers the review box horizontally */
}
 .h2 {
  color: #0d0e10;
  margin-bottom: 20px;
  text-align: center;
}
.textarea {
  width: 100%;
  margin-bottom: 15px;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  resize: vertical;
}
 .star-rating {
  display: flex;
  font-size: 2rem;
  justify-content: center;
  margin-bottom: 15px;
}
.star {
  cursor: pointer;
  color: #ccc;
  transition: color 0.2s;
  margin: 0 3px;
}
.star.selected,
.star.hovered {
  color: #ffcc00;
}
button {
  width: 100%;
  background-color: #080909;
  border: none;
  color: white;
  padding: 10px;
  border-radius: 5px;
  font-weight: bold;
  cursor: pointer;
  font-size: 1rem;
}
button:hover {
  background-color: #989a9c;
}
#response {
  margin-top: 15px;
  font-weight: 500;
  color: green;
  text-align: center;
}
/* Thank You Modal Styling */
modal {
  display: none;
  position: fixed;
  z-index: 2000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  justify-content: center;
  align-items: center;
}
.modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
  text-align: center;
  width: 300px;
  position: relative;
}
.modal-content p {
  font-size: 1.1rem;
  color: #333;
}
.modal-content .close {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 1.2rem;
  cursor: pointer;
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
    <div class="heading">
    <h2>Contact The Best Home Interior Designers</h2>
    <p>At Interior Solutions, we want to make finding the designs you love as easy & exciting as possible. To provide stunning solutions to the residential market and to meet the ever-growing demands, we have expanded our showrooms with presence in  Bangalore, Mysore, Chennai, & Mangalore. Scroll down to find out more locations we serve. Contact us or walk into our showrooms and let our professional interior designers help you decorate your home and find furniture you’ll love. We would love to help you with your next project!</p>
    </div>
    <section class="contact-container">
    <div class="contact-form">
    <h2 class="section-title">Our Locations</h2>
        <div class="locations">
            <div class="location-card">
                <h3>Bengaluru</h3>
                <p>760, 19th Main Rd, HSR Layout, Bengaluru, Karnataka</p>
                <p>Phone: +91 999 888 7777</p>
                <a href="https://maps.app.goo.gl/m9KUunibz6Pa4Jrx5" target="_blank" rel="noopener noreferrer">View on Map</a>
            </div>
            <div class="location-card">
                <h3>Mysuru</h3>
                <p>No 10, BM Habitat Mall, Jayalakshmipuram, Mysuru, Karnataka</p>
                <p>Phone: +91 938 342 3333</p>
                <a href="https://maps.app.goo.gl/hHoWduUDdhcc6AdY8" target="_blank" rel="noopener noreferrer">View on Map</a>
            </div>
            <div class="location-card">
                <h3>Mangaluru</h3>
                <p>Flat No 203, Elegance Apartments, Kadri Hills, Mangaluru, Karnataka</p>
                <p>Phone: +91 949 606 2222</p>
                <a href="https://maps.app.goo.gl/JXopd63P5WMwy4tg7" target="_blank" rel="noopener noreferrer"`>View on Map</a>
            </div>
            <div>
        <section class="contact-section">
            <h2 class="section-title">Let’s Work on Your Dream Home Interiors</h2>
                <img src="https://dlifeinteriors.com/wp-content/uploads/2023/06/seeyou1.jpg" alt="Dream Home Interiors">
                <div style="display: flex; justify-content: center; align-items: center; height: 10vh;"></div>            
                <!-- Popup Modal -->
<div id="popupModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Start Planning Your Home Interiors Now</h2>
        <p>Fill in your details, and our team will contact you soon!</p>
        <form id="contactForm">
        <input type="text" name="name" placeholder="Your Name" required>
                <input type="text" name="mobile" placeholder="Mobile Number" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="project-location" placeholder="Project Location" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
<!-- "Start Planning" Button -->
<div style="display: flex; justify-content: center; align-items: center; height: 5vh;">
    <a href="#" class="cta-button" id="openPopup">Start Planning Your Home Interiors Now</a>
</div>
<!-- JavaScript for Popup -->
<script>
    var modal = document.getElementById("popupModal");
    var btn = document.getElementById("openPopup");
    var closeBtn = document.getElementsByClassName("close")[0];
    // Open modal
    btn.onclick = function(event) {
        event.preventDefault(); // Prevent default anchor behavior
        modal.style.display = "flex"; 
    };
    // Close modal when clicking "X"
    closeBtn.onclick = function() {
        modal.style.display = "none";
    };
    // Close modal when clicking outside the modal
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };
</script>
</div>
</div>
</section>
</section>
</section>
<!-- Review Box Section -->
<div class="review-box">
  <h2>Customer Reviews</h2>
  <!-- Review form -->
  <form id="reviewForm" method="POST" action="reviews.php">
    <!-- Review Text -->
    <label for="review">Add a Review</label>
    <textarea id="review" name="review" placeholder="Enter your review" required></textarea>
    <!-- Star Rating -->
    <div class="star-rating" id="starRating">
      <span class="star" data-value="1">&#9733;</span>
      <span class="star" data-value="2">&#9733;</span>
      <span class="star" data-value="3">&#9733;</span>
      <span class="star" data-value="4">&#9733;</span>
      <span class="star" data-value="5">&#9733;</span>
    </div>
    <!-- Hidden input for selected rating -->
    <input type="hidden" name="rating" id="rating" value="">
    <!-- Error message display -->
    <p id="formError" style="color: red; display: none;"></p>
    <!-- Submit button -->
    <button type="submit">Submit Review</button>
  </form>
</div>
<!-- Thank You Modal -->
<div id="thankyouModal" class="modal" style="display: none;">
  <div class="modal-content">
    <span id="closeThankYou" class="close" style="cursor: pointer;">&times;</span>
    <p>Thank you for your review!</p>
  </div>
</div>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');
    const errorElem = document.getElementById("formError");
    const modal = document.getElementById("thankyouModal");
    const closeModalBtn = document.getElementById("closeThankYou");
    const reviewForm = document.getElementById("reviewForm");
    // Update stars based on rating
    function updateStars(rating) {
      stars.forEach(star => {
        const value = parseInt(star.getAttribute('data-value'));
        star.classList.toggle('selected', value <= rating);
      });
    }
    // Show error
    function showError(message) {
      errorElem.textContent = message;
      errorElem.style.display = "block";
    }
    // Hide error
    function hideError() {
      errorElem.textContent = "";
      errorElem.style.display = "none";
    }
    // Show thank you modal
    function showThankYouModal() {
      modal.style.display = "flex";
    }
    // Handle star events
    stars.forEach(star => {
      star.addEventListener("click", function () {
        const rating = this.getAttribute("data-value");
        ratingInput.value = rating;
        updateStars(rating);
      });
      star.addEventListener("mouseover", function () {
        const rating = this.getAttribute("data-value");
        stars.forEach(s => {
          const value = parseInt(s.getAttribute("data-value"));
          s.classList.toggle("hovered", value <= rating);
        });
      });
      star.addEventListener("mouseout", () => {
        stars.forEach(s => s.classList.remove("hovered"));
      });
    });
    // Close modal
    closeModalBtn.addEventListener("click", () => {
      modal.style.display = "none";
    });
    // Close modal if clicked outside
    window.addEventListener("click", event => {
      if (event.target === modal) {
        modal.style.display = "none";
      }
    });
    // Submit form via AJAX
    reviewForm.addEventListener("submit", function (e) {
      e.preventDefault();

      const review = document.getElementById("review").value.trim();
      const rating = ratingInput.value;

      if (!review) {
        showError("Please write a review.");
        return;
      }

      if (!rating || rating < 1 || rating > 5) {
        showError("Please select a rating from 1 to 5.");
        return;
      }

      hideError();

      const xhr = new XMLHttpRequest();
      xhr.open("POST", "reviews.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

      xhr.onload = function () {
        if (xhr.status === 200) {
          console.log("Server response:", xhr.responseText);
          showThankYouModal();
          reviewForm.reset();
          updateStars(0);
        } else {
          showError("Server error. Try again later.");
        }
      };

      xhr.onerror = function () {
        showError("Network error. Please try again.");
      };

      const params = `review=${encodeURIComponent(review)}&rating=${encodeURIComponent(rating)}`;
      xhr.send(params);
    });
  });
</script>
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

