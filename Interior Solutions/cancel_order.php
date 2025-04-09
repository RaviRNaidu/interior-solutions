<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if (!isset($_SESSION['user_id'])) {
    die("not_logged_in");
}

$user_id    = $_SESSION['user_id'];
$booking_id = $_POST['booking_id'] ?? 0;

$conn = new mysqli("localhost","root","","interior_solutions");
if ($conn->connect_error) {
    die("DB error: " . $conn->connect_error);
}

// 1) Update booking status to 'Cancelled' if it belongs to the current user
$sql = "UPDATE bookings SET status='Cancelled'
        WHERE id=? AND user_id=? AND status<>'Cancelled'";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $booking_id, $user_id);
$stmt->execute();

if ($stmt->affected_rows < 1) {
    // Either not found or already cancelled
    $stmt->close();
    $conn->close();
    die("error");
}
$stmt->close();

// 2) Fetch booking details for email
$sql = "SELECT design_name, design_price, amount_paid, remaining_amount
        FROM bookings
        WHERE id=? AND user_id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $booking_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();
$booking = $result->fetch_assoc();
$stmt->close();

// 3) Also fetch user's email, name from contact_info or users table
// For simplicity, assume contact_info has the user’s latest info
$sql = "SELECT name, email
        FROM contact_info
        WHERE user_id = ?
        ORDER BY created_at DESC
        LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$userData = $result->fetch_assoc();
$stmt->close();
$conn->close();

$user_name  = $userData['name'];
$user_email = $userData['email'];

$d_name     = $booking['design_name'];
$d_price    = number_format($booking['design_price'],2);
$amt_paid   = number_format($booking['amount_paid'],2);
$amt_remain = number_format($booking['remaining_amount'],2);

// 4) Send cancellation email to user + admins
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'rarrvr66@gmail.com';
    $mail->Password   = 'pzmt vzlb jhyw vgon';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('YOUR_GMAIL@gmail.com','Interior Solutions');
    $mail->isHTML(true);

    // 4a) Email user
    $mail->addAddress($user_email, $user_name);
    $mail->Subject = "Order Cancelled - Interior Solutions";
    $mail->Body = "
        <h2>Order Cancelled</h2>
        <p>Hi $user_name,</p>
        <p>We are sorry, but your order for <strong>$d_name</strong> has been cancelled.</p>
        <h3>Order Details:</h3>
        <ul>
            <li>Design Name: $d_name</li>
            <li>Price: ₹$d_price</li>
            <li>Amount Paid: ₹$amt_paid</li>
            <li>Remaining: ₹$amt_remain</li>
        </ul>
        <p>If you have any questions, feel free to contact us.</p>
        <p>Regards,<br><strong>Interior Solutions Team</strong></p>
    ";
    $mail->send();

    // 4b) Email admins
    $admin_emails = ["rarrvr66@gmail.com","raviramakrishna2006@gmail.com"];
    $mail->clearAddresses();
    $mail->Subject = "Order Cancelled by $user_name";
    $bodyAdmin = "
        <h2>Order Cancelled</h2>
        <p>User <strong>$user_name</strong> ($user_email) has cancelled their booking.</p>
        <h3>Booking Details:</h3>
        <ul>
            <li>Design Name: $d_name</li>
            <li>Price: ₹$d_price</li>
            <li>Amount Paid: ₹$amt_paid</li>
            <li>Remaining: ₹$amt_remain</li>
        </ul>
        <p>Status in DB is now 'Cancelled'.</p>
    ";
    $mail->Body = $bodyAdmin;
    foreach ($admin_emails as $admin) {
        $mail->addAddress($admin);
    }
    $mail->send();

    echo "success";
} catch (Exception $e) {
    echo "Mailer error: " . $mail->ErrorInfo;
}
?>
