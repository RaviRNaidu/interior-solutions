<?php
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

        // Send OTP to the email
        mail($email, "Your OTP Code", "Your OTP code is: $otp");

        // Redirect to reset password page
        session_start();
        $_SESSION['email'] = $email;
        header('Location: reset_password.php');
        exit();
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
</head>
<body>
    <form action="forgot_password.php" method="POST">
        <h2>Forgot Password</h2>
        <?php echo $message; ?>
        <label for="email">Enter your registered email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
        <button type="submit">Send OTP</button>
    </form>
</body>
</html>
