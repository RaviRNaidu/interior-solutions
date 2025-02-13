<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'interior_solutions');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the email exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Generate OTP
        $otp = rand(100000, 999999);

        // Save OTP in the database
        $sql = "UPDATE users SET otp = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $otp, $email);
        $stmt->execute();

        // Send OTP via PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Use your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'rarrvr66@gmail.com'; // Your Gmail address
            $mail->Password = 'pzmt vzlb jhyw vgon'; // Your Gmail App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Email settings
            $mail->setFrom('your-email@gmail.com', 'Interior Solutions');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body = "Your OTP code is: <b>$otp</b>";

            $mail->send();
            session_start();
            $_SESSION['email'] = $email;
            header('Location: verify_otp.php');
            exit();
        } catch (Exception $e) {
            $message = "<p style='color: red; text-align: center;'>OTP could not be sent. Mailer Error: {$mail->ErrorInfo}</p>";
        }
    } else {
        $message = "<p style='color: red; text-align: center;'>No account found with this email.</p>";
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
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
            color: #333;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://artificialpaintings.com/wp-content/uploads/2024/06/1616_interior_architect.webp') no-repeat center center/cover;
            padding: 20px;
        }

        .login-form {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align:;
        }

        .login-form h2 {
            margin-bottom: 15px;
            font-size: 26px;
            text-align: center;
            color: #2c3e50;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-container img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }

        .logo-container h1 {
            font-size: 22px;
            font-weight: 600;
            color: #34495e;
            margin-top: 10px;
        }

        .login-form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #34495e;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #f9f9f9;
        }

        .login-form input:focus {
            outline: none;
            border-color: #3498db;
            background: #fff;
        }

        .login-form button {
            width: 100%;
            padding: 12px;
            background-color: rgb(27, 40, 42);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color:rgb(66, 119, 121);
        }

        .login-form p {
            text-align: center;
            margin-top: 10px;
            color: #7f8c8d;
        }

        .login-form p a {
            color:rgb(42, 63, 78);
            text-decoration: none;
        }

        .login-form p a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .login-form {
                padding: 20px;
            }

            .login-form h2 {
                font-size: 22px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="forgot_password.php" method="POST">
            <div class="logo-container">
                <img src="img/logo.jpg" alt="Website Logo">
                <h1>Interior Solutions</h1>
            </div>
            <h2>Forgot Password</h2>
            <?php echo $message; ?>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your registered email" required>
            <button type="submit">Send OTP</button>

            <p>Remember The Password? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>
</html>