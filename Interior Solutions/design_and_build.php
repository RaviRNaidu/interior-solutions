<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Design and Build</title>
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

        nav a.active {
            font-weight: bold;
            text-decoration: underline;
        }
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: url('img/wwd.jpg') no-repeat center center/cover;
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

        .co-circle {
            display: flex;
            flex-wrap: wrap;
            gap: 5px; /* Space between each circle+text+arrow block */
            justify-content: center;
            align-items: center;
            margin-top: 40px;
        }
        /* Container for the circle + text (stacked vertically) */
        .circle-text-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        /* Each circle container still groups the circle-text wrapper and the arrow */
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
        /* Text below each circle */
        .circle-title {
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px; /* Space between circle and text */
            text-align: center;
            max-width: 160px; /* So it aligns nicely under the circle */
        }
        /* Hover effect on circle */
        .circle:hover {
            transform: scale(1.05);
        }
        /* Simple arrow styling */
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
        /* Responsive: stack vertically on smaller screens */
        @media (max-width: 768px) {
            .co-circle {
                flex-direction: column;
                gap: 20px;
            }
            .circle-container {
                flex-direction: column;
            }
            .arrow {
                transform: rotate(90deg);
                margin: 10px 0;
            }
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

    .customize_home, .talk, .plan_design, .deal_company {
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

    .customize_home:hover {
        background-color: rgb(66, 119, 121);
    }
    .talk:hover {
        background-color: rgb(66, 119, 121);
    }
    .plan_design:hover {
        background-color: rgb(66, 119, 121);
    }
    .deal_company:hover {
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
        <a href="dashboard.php"><img src="img/interior.png" alt="Interior Solutions Logo"></a>
    </div>
        <nav>
            <a href="dashboard.php">Home</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">What We Do</a>
                <ul class="dropdown-menu">
                    <li><a href="customize_interiors.php">Customized Interiors</a></li>
                    <li><a href="design_and_build.php" class="active">Design And Build</a></li>
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
            <h1>Design, Production & Execution</h1>
            <p>By One Company</p>
        </div>
    </div>
    <div class="intro-section">
        <h2>Design ‘N’ Build</h2>
        <p>Complete customization by qualified and experienced interior designers assigned to the client is the system of Interior Solutions. We provide complete solutions to your interiors including sharp and focused spatial planning, interior design, furnishings, and decoration. First we make the design in discussion with the client, get approval and then build it exactly as per plan. Each branch has expert designers, working closely with clients in cooperation with business development managers, factory and project installation team.</p>
        <div class="co-circle">
            <!-- 1st circle -->
            <div class="circle-container">
              <div class="circle-text-wrapper">
                <div class="circle">
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
            <div class="circle-container">
              <div class="circle-text-wrapper">
                <div class="circle">
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
            <div class="circle-container">
              <div class="circle-text-wrapper">
                <div class="circle">
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
            <div class="circle-container">
              <div class="circle-text-wrapper">
                <div class="circle">
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
            <div class="circle-container">
              <div class="circle-text-wrapper">
                <div class="circle">
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
    <div class="custom-section section-one">
    <div class="custom-image">
        <img src="img/design.jpg" alt="Custom Home Interior">
    </div>
    <div class="custom-content">
        <h2>Design</h2>
        <ul>
            <li>Project is allocated to a designer with clear instructions from the business development manager who initially deals with the client.</li>
            <li>Study the requirements in detail: In discussion with the client, with the help of floor plan, designer understands the space and requirements carefully.</li>
            <li>Actual measurements and drawing: Designer visits the house/ flat and takes actual measurement of the space as per the requirements discussed.</li>
            <li>Detailed drawing is prepared and sent to the client.</li>
            <li>Finalization of drawings in mutual agreement. Drawings sent to the factory for production.</li>
        </ul>
        <a class="talk" onclick="openTalkForm()">Meet our Interior Designer</a>
    </div>
</div>

<div class="custom-section section-two">
    <div class="custom-content">
        <h2>Production</h2>
        <ul>
            <li>Clarifications and confirmations made between factory manager and designer.</li>
            <li>A revisit to the house/ flat is made to repeat the actual measurements to confirm it with drawings received in the factory.</li>
            <li>Production is scheduled on a date in agreement with client, as per confirmation of site status by project manager.</li>
        </ul>
        <a class="customize_home" onclick="openCustomizeForm()">Get Customized Home Interiors</a>
    </div>
    <div class="custom-image">
        <img src="img/production.jpg" alt="Personalized Home Interior">
    </div>
</div>
<div class="custom-section section-one">
    <div class="custom-image">
        <img src="img/execution.jpg" alt="Custom Home Interior">
    </div>
    <div class="custom-content">
        <h2>Execution</h2>
        <ul>
            <li>Project implementation is planned well in advance by the team head. He arranges for the installation immediately upon delivery of products at site.</li>
            <li>We have our own logistics team to provide easy and safe transportation for furnishings to site.</li>
            <li>Number of days expected for installation as per the volume of work is informed to client.</li>
        </ul>
        <a class="plan_design" onclick="openPlanForm()">Plan an Interior Project</a>
    </div>
</div>

<div class="custom-section section-two">
    <div class="custom-content">
        <h2>Project Handover</h2>
        <ul>
            <li>We are totally committed to on-time & accurate completion of every project.</li>
            <li>Our team ensures no debris, noise or disturbance is caused and also guarantees the safety or welfare of the surrounding neighbors.</li>
            <li>Our team will leave your site only after getting the satisfaction report.</li>
        </ul>
        <a class="deal_company" onclick="openCompanyForm()">Deal Directly With The Company</a>
    </div>
    <div class="custom-image">
        <img src="img/handover.jpg" alt="Personalized Home Interior">
    </div>
</div>
        <script>
            // Get all circle elements
            const circles = document.querySelectorAll('.circle');
            let currentIndex = 0;
        
            // Highlight a single circle at a time, every 2 seconds
            setInterval(() => {
              // Reset background and text color for all circles
              circles.forEach(circle => {
                circle.style.backgroundColor = ''; // or 'transparent'
                circle.style.color = '#000'; // default text color
        
                // Reset image filter if any image exists
                const img = circle.querySelector('img');
                if (img) {
                  img.style.filter = 'none';
                }
              });
        
              // Highlight the current circle
              circles[currentIndex].style.backgroundColor = '#000'; // Black background
              circles[currentIndex].style.color = '#fff'; // White text
        
              // Invert image color to white (works well for SVGs)
              const currentImg = circles[currentIndex].querySelector('img');
              if (currentImg) {
                currentImg.style.filter = 'invert(1)';
              }
        
              // Move to the next circle, wrapping around at the end
              currentIndex = (currentIndex + 1) % circles.length;
            }, 2000);
        
            // Remove the last arrow from the last circle-container
            const circleContainers = document.querySelectorAll('.circle-container');
            if (circleContainers.length > 0) {
              const lastContainer = circleContainers[circleContainers.length - 1];
              const lastArrow = lastContainer.querySelector('.arrow');
              if (lastArrow) {
                lastArrow.remove();
              }
            }
          </script>
    <!-- Talk to Expert Popup -->
    <div class="popup-overlay" id="popupForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Meet Our Interior Designer</h2>
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
    <!-- Customize Popup -->
    <div class="popup-overlay" id="popupCustomizeForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Get Customized Home Interiors</h2>
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
    <!-- Planning Popup -->
    <div class="popup-overlay" id="popupPlanningForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Plan an Interior Project</h2>
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
    <!-- Deal with Company Popup -->
    <div class="popup-overlay" id="popupCompanyForm">
        <div class="popup">
            <div class="popup-header">
                <h2>Deal Directly with the Company</h2>
                <button class="close-btn" onclick="closeForm('popupCompanyForm')">×</button>
            </div>
            <hr>
            <p>Please fill out the enquiry below and we will get back to you as soon as possible</p>
            <form id="enquiryForm" onsubmit="submitForm(event, 'deal_company')">
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