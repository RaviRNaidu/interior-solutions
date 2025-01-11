<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    // Validate passwords
    if ($password !== $confirm_password) {
        echo "<p style='color: red;'>Passwords do not match. Please try again.</p>";
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'interior_solutions');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<p style='color: red;'>Email is already registered. Please try another.</p>";
    } else {
        // Insert user into database
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $username, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Registration successful! You can now log in.</p>";
        } else {
            echo "<p style='color: red;'>An error occurred. Please try again.</p>";
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - Interior Design</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        .signup-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://artificialpaintings.com/wp-content/uploads/2024/06/1616_interior_architect.webp') no-repeat center center/cover;
            padding: 20px;
        }

        .signup-form {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }

        .signup-form h2 {
            margin-bottom: 20px;
            font-size: 28px;
            text-align: center;
            color: #2c3e50;
        }

        .signup-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #34495e;
        }

        .signup-form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .signup-form input:focus {
            outline: none;
            border-color: #3498db;
            background: #fff;
        }

        .signup-form button {
            width: 100%;
            padding: 12px;
            background-color:rgb(27, 40, 42);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .signup-form button:hover {
            background-color: #2980b9;
        }

        .signup-form p {
            text-align: center;
            margin-top: 15px;
            color: #7f8c8d;
        }

        .signup-form p a {
            color:rgb(42, 63, 78);
            text-decoration: none;
        }

        .signup-form p a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .signup-form {
                padding: 30px;
            }

            .signup-form h2 {
                font-size: 24px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="signup-container">
        <form class="signup-form" action="signup.php" method="POST">
            <h2>Create Your Account</h2>
            <label for="username">Full Name</label>
            <input type="text" id="username" name="username" placeholder="Enter your full name" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>

            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

            <button type="submit">Sign Up</button>

            <p>Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>