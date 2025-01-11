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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #444;
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

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: url('https://media.designcafe.com/wp-content/uploads/2022/07/29185240/industrial-rustic-living-room-in-earthy-tones.jpg') no-repeat center center/cover;
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
            font-size: 18px;
            margin-bottom: 20px;
        }

        .hero .btn {
            padding: 10px 20px;
            background-color: #fff;
            color: #333;
            text-decoration: none;
            font-weight: bold;
            border-radius: 4px;
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

        .product .info .price {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Interior Solutions</div>
        <nav>
            <a href="#">Home</a>
            <a href="about_us.php">About Us</a>
            <a href="what_we_do.php">What We Do</a>
            <a href="product.php">Product</a>
            <a href="gallery.php">Gallery</a>
            <a href="contact.php">Contact</a>
        </nav>
    </header>

    <div class="hero">
        <div class="text">
            <h1>Interior Solutions</h1>
            <p>Feel free to browse our shop and choose what you like for your home.</p>
            <a href="#" class="btn">Shop Now</a>
        </div>
    </div>

    <div class="spotlight">
        <h2>In the Spotlight</h2>
        <div class="products">
            <div class="product">
                <img src="https://st.hzcdn.com/simgs/3eb1952406f72e55_14-5330/_.jpg" alt="Product 1">
                <div class="info">
                    <h3>Product Name</h3>
                    <p>Short product description goes here.</p>
                    <div class="price">$29.99</div>
                </div>
            </div>
            <div class="product">
                <img src="https://withinthegrove.com/wp-content/uploads/2021/09/Within-the-Grove-x-Rugs-USA-Living-Room-3-scaled.jpg" alt="Product 2">
                <div class="info">
                    <h3>Product Name</h3>
                    <p>Short product description goes here.</p>
                    <div class="price">$39.99</div>
                </div>
            </div>
            <div class="product">
                <img src="https://images.livspace-cdn.com/w:3840/plain/https://d3gq2merok8n5r.cloudfront.net/abhinav/ond-1634120396-Obfdc/ond-2024-1727950725-vfT46/living-1728890772-3eAJ0/living-room-2-1730103654-KJKlz.jpg" alt="Product 3">
                <div class="info">
                    <h3>Product Name</h3>
                    <p>Short product description goes here.</p>
                    <div class="price">$49.99</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>