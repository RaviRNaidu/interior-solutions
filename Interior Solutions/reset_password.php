<?php
session_start();
$message = "";

if (!isset($_SESSION['email'])) {
    // Redirect to forgot_password if email is not set
    header('Location: forgot_password.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = htmlspecialchars($_POST['new_password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    $email = $_SESSION['email'];

    if ($new_password !== $confirm_password) {
        $message = "<p style='color: red; text-align: center;'>Passwords do not match. Please try again.</p>";
    } else {
        // Check password strength
        if (strlen($new_password) < 8) {
            $message = "<p style='color: red; text-align: center;'>Password must be at least 8 characters long.</p>";
        } elseif (!preg_match('/[A-Z]/', $new_password)) {
            $message = "<p style='color: red; text-align: center;'>Password must contain at least one uppercase letter.</p>";
        } elseif (!preg_match('/[a-z]/', $new_password)) {
            $message = "<p style='color: red; text-align: center;'>Password must contain at least one lowercase letter.</p>";
        } elseif (!preg_match('/[0-9]/', $new_password)) {
            $message = "<p style='color: red; text-align: center;'>Password must contain at least one digit.</p>";
        } elseif (!preg_match('/[\W_]/', $new_password)) {
            $message = "<p style='color: red; text-align: center;'>Password must contain at least one special character.</p>";
        } else {
            // All checks passed, hash the password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Database connection
            $conn = new mysqli('localhost', 'root', '', 'interior_solutions');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Update password in the database and clear any OTP if exists
            $sql = "UPDATE users SET password = ?, otp = NULL WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $hashed_password, $email);

            if ($stmt->execute()) {
                $message = "<p style='color: green; text-align: center;'>Password updated successfully. <a href='login.php'>Login now</a></p>";
                unset($_SESSION['email']); // Clear the email session
            } else {
                $message = "<p style='color: red; text-align: center;'>Error updating password. Please try again.</p>";
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
  <title>Reset Password</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f4f4;
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
    .login-form h2 {
      text-align: center;
      margin-bottom: 15px;
      font-size: 26px;
      color: #2c3e50;
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
      background-color: rgb(66, 119, 121);
    }
    .login-form p {
      text-align: center;
      margin-top: 10px;
      font-size: 12px;
      color: #7f8c8d;
    }
    .login-form p a {
      color: rgb(42, 63, 78);
      text-decoration: none;
    }
    .login-form p a:hover {
      text-decoration: underline;
    }
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="login-container">
    <form class="login-form" action="reset_password.php" method="POST">
      <div class="logo-container">
        <img src="img/logo.jpg" alt="Website Logo">
        <h1>Interior Solutions</h1>
      </div>
      <h2>Reset Password</h2>
      <?php echo $message; ?>
      
      <label for="new_password">New Password</label>
      <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>

      <label for="confirm_password">Confirm Password</label>
      <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>

      <button type="submit">Change Password</button>
    </form>
  </div>
</body>
</html>
