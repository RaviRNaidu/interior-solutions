<?php
$registration_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    // First check if passwords match
    if ($password !== $confirm_password) {
        $registration_message = "<p style='color: red; text-align: center;'>Passwords do not match. Please try again.</p>";
    } else {
        // Check password strength
        if (strlen($password) < 8) {
            $registration_message = "<p style='color: red; text-align: center;'>Password must be at least 8 characters long.</p>";
        } elseif (!preg_match('/[A-Z]/', $password)) {
            $registration_message = "<p style='color: red; text-align: center;'>Password must contain at least one uppercase letter.</p>";
        } elseif (!preg_match('/[a-z]/', $password)) {
            $registration_message = "<p style='color: red; text-align: center;'>Password must contain at least one lowercase letter.</p>";
        } elseif (!preg_match('/[0-9]/', $password)) {
            $registration_message = "<p style='color: red; text-align: center;'>Password must contain at least one digit.</p>";
        } elseif (!preg_match('/[\W_]/', $password)) {
            // \W matches any non-word character (special chars), _ is also included just in case
            $registration_message = "<p style='color: red; text-align: center;'>Password must contain at least one special character.</p>";
        } else {
            // All checks passed, hash the password
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
                $registration_message = "<p style='color: red; text-align: center;'>Email is already registered. Please try another.</p>";
            } else {
                // Insert user into database
                $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sss', $username, $email, $hashed_password);

                if ($stmt->execute()) {
                    $registration_message = "<p style='color: green; text-align: center;'>Registration successful! You can now log in.</p>";
                } else {
                    $registration_message = "<p style='color: red; text-align: center;'>An error occurred. Please try again.</p>";
                }
            }

            $stmt->close();
            $conn->close();
        }
    }
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
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://artificialpaintings.com/wp-content/uploads/2024/06/1616_interior_architect.webp') no-repeat center center/cover;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .signup-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .signup-container img.logo {
            max-width: 100px;
            margin-bottom: 15px;
        }

        .signup-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .signup-form label {
            display: block;
            text-align: left;
            font-weight: bold;
            color: #34495e;
            margin-bottom: 5px;
            font-size: 13px;
        }

        .signup-form input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
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
            background-color: rgb(27, 40, 42);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .signup-form button:hover {
            background-color: rgb(66, 119, 121);
        }

        .signup-form p {
            text-align: center;
            margin-top: 10px;
            font-size: 12px;
            color: #7f8c8d;
        }

        .signup-form p a {
            color: rgb(42, 63, 78);
            text-decoration: none;
        }

        .signup-form p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <!-- Add your logo -->
        <img src="img/logo.jpg" alt="Logo" class="logo"> <!-- Replace 'logo.png' with the path to your logo -->

        <!-- Website name -->
        <h1>Interior Solutions</h1>

        <form class="signup-form" action="signup.php" method="POST">
            <?php echo $registration_message; ?>
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
