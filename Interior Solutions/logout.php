<?php
// Start the session
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - Interior Design</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        .logout-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://source.unsplash.com/1600x900/?architecture-design') no-repeat center center/cover;
            padding: 20px;
        }

        .logout-message {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .logout-message h2 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #2c3e50;
        }

        .logout-message p {
            margin-bottom: 20px;
            font-size: 16px;
            color: #34495e;
        }

        .logout-message a {
            display: inline-block;
            padding: 12px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .logout-message a:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .logout-message {
                padding: 30px;
            }

            .logout-message h2 {
                font-size: 24px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="logout-container">
        <div class="logout-message">
            <h2>You Have Been Logged Out</h2>
            <p>Thank you for visiting. We hope to see you again soon!</p>
            <a href="login.php">Log In Again</a>
        </div>
    </div>
</body>
</html>