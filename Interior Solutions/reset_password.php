<?php
session_start();
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $otp = htmlspecialchars($_POST['otp']);
    $new_password = password_hash(htmlspecialchars($_POST['new_password']), PASSWORD_DEFAULT);
    $email = $_SESSION['email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'interior_solutions');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verify OTP
    $sql = "SELECT * FROM users WHERE email = ? AND otp = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $email, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update password
        $sql = "UPDATE users SET password = ?, otp = NULL WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $new_password, $email);
        $stmt->execute();

        $message = "<p style='color: green; text-align: center;'>Password updated successfully. <a href='login.php'>Login now</a></p>";
    } else {
        $message = "<p style='color: red; text-align: center;'>Invalid OTP. Please try again.</p>";
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
    <title>Reset Password</title>
</head>
<body>
    <form action="reset_password.php" method="POST">
        <h2>Reset Password</h2>
        <?php echo $message; ?>
        <label for="otp">Enter OTP</label>
        <input type="text" id="otp" name="otp" placeholder="Enter OTP" required>

        <label for="new_password">New Password</label>
        <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
