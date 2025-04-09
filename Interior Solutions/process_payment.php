<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure PHPMailer is installed via Composer

// 1. Connect to the database
$conn = new mysqli("localhost", "root", "", "interior_solutions");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 2. Retrieve data from the payment form
$user_id          = $_SESSION['user_id'];
$name             = $_POST['name'] ?? '';
$email            = $_POST['email'] ?? '';
$phone            = $_POST['phone'] ?? '';
$country          = $_POST['country'] ?? '';
$address          = $_POST['address'] ?? '';
$project_location = $_POST['project_location'] ?? '';
$payment_method   = $_POST['payment_method'] ?? '';

// 3. Insert contact info into the contact_info table
$sql = "INSERT INTO contact_info (user_id, name, email, phone, country, address, project_location) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Contact info prepare failed: " . $conn->error);
}
$stmt->bind_param("issssss", $user_id, $name, $email, $phone, $country, $address, $project_location);
if (!$stmt->execute()) {
    die("Contact info insert error: " . $stmt->error);
}
$stmt->close();

// 4. Fetch designs from the user's cart (along with image, name, price)
$sql = "SELECT c.design_id, d.image, d.name, d.price 
        FROM cart c 
        JOIN designs d ON c.design_id = d.id
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$design_details = [];
$total_price = 0;
while ($row = $result->fetch_assoc()) {
    $design_details[] = $row;
    $total_price += $row['price'];
}
$stmt->close();

// After retrieving $_POST['card_number'], $_POST['cvc'], etc.:
// or $_POST['upi_code']
// Insert into payment table:

// 4) Insert payment information if the user used a card or UPI
if (!empty($_POST['card_number'])) {
    // User used a card
    $card_number      = $_POST['card_number'];
    $cvc              = $_POST['cvc'];
    $card_holder_name = $_POST['card_holder_name'];
    $expiry_month     = $_POST['expiry_month'];
    $expiry_year      = $_POST['expiry_year'];

    $pay_sql = "INSERT INTO payment 
      (user_id, payment_method, card_number, cvc, card_holder_name, expiry_month, expiry_year) 
       VALUES (?, ?, ?, ?, ?, ?, ?)";
    $pay_stmt = $conn->prepare($pay_sql);
    $pay_stmt->bind_param("issssii", 
      $user_id, $payment_method, $card_number, $cvc, $card_holder_name, $expiry_month, $expiry_year
    );
    $pay_stmt->execute();
    $pay_stmt->close();
} elseif (!empty($_POST['upi_code'])) {
    // User used UPI
    $upi_entered_code = $_POST['upi_code'];
    // Verify the entered UPI code against the one stored in session
    if (!isset($_SESSION['upi_generated_code']) || $_SESSION['upi_generated_code'] !== $upi_entered_code) {
        echo "error: UPI code does not match";
        exit();
    }
    // Insert UPI payment info (store both the generated and entered codes if needed)
    $pay_sql = "INSERT INTO payment (user_id, payment_method, upi_generated_code, upi_entered_code) 
                VALUES (?, ?, ?, ?)";
    $pay_stmt = $conn->prepare($pay_sql);
    $pay_stmt->bind_param("isss", $user_id, $payment_method, $_SESSION['upi_generated_code'], $upi_entered_code);
    $pay_stmt->execute();
    $pay_stmt->close();
}

// 5. Insert each design into the bookings table
// NOTE: For each design, 20% of the price is paid and the remaining 80% is due.
// Here we gather the newly inserted booking IDs.
if (!isset($_SESSION['recent_booking_ids'])) {
    $_SESSION['recent_booking_ids'] = [];
}

foreach ($design_details as $design) {
    $d_id            = $design['design_id'];
    $d_img           = $design['image'];
    $d_name          = $design['name'];
    $d_price         = $design['price'];
    $amount_paid     = 0.2 * $d_price;
    $remaining_amount = $d_price - $amount_paid;
    
    $insert_sql = "INSERT INTO bookings 
                   (user_id, design_id, design_image, design_name, design_price, amount_paid, remaining_amount, payment_method, status)
                   VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Confirmed')";
    $insert_stmt = $conn->prepare($insert_sql);
    if (!$insert_stmt) {
        die("Booking prepare failed: " . $conn->error);
    }
    // Correct binding: two ints, two strings, three doubles, one string
    $insert_stmt->bind_param("iissddds", $user_id, $d_id, $d_img, $d_name, $d_price, $amount_paid, $remaining_amount, $payment_method);
    if (!$insert_stmt->execute()) {
        die("Booking insert error: " . $insert_stmt->error);
    }
    // *** Store the newly inserted booking ID in the session array
    $newBookingId = $insert_stmt->insert_id;
    $_SESSION['recent_booking_ids'][] = $newBookingId;

    $insert_stmt->close();
}

// 6. Clear the user's cart
$delete_sql = "DELETE FROM cart WHERE user_id = ?";
$delete_stmt = $conn->prepare($delete_sql);
$delete_stmt->bind_param("i", $user_id);
$delete_stmt->execute();
$delete_stmt->close();

// 7. Prepare design details for email notification
$design_list = "";
foreach ($design_details as $d) {
    $design_list .= "<li>" . htmlspecialchars($d['name']) . " - ₹" . number_format($d['price'], 2) . "</li>";
}
$mail_total = number_format($total_price, 2);

// 8. Setup PHPMailer for sending emails
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'rarrvr66@gmail.com'; // Your Gmail address
    $mail->Password   = 'pzmt vzlb jhyw vgon';  // Your Gmail App Password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    // Use the same email in setFrom as your username:
    $mail->setFrom('rarrvr66@gmail.com', 'Interior Solutions');
    $mail->isHTML(true);

    // 8a. Send confirmation email to the user
    $mail->addAddress($email, $name);
    $mail->Subject = "Booking Confirmation - Interior Solutions";
    $bodyUser = "
        <h2>Booking Confirmed</h2>
        <p>Dear $name,</p>
        <p>Thank you for your order! Your booking has been confirmed.</p>
        <h3>Contact Information:</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Country:</strong> $country</p>
        <p><strong>Address:</strong> $address</p>
        <p><strong>Project Location:</strong> $project_location</p>
        <h3>Booked Designs:</h3>
        <ul>$design_list</ul>
        <p><strong>Total Price:</strong> ₹$mail_total</p>
        <p><strong>Payment Method:</strong> $payment_method</p>
        <p>We will contact you soon to discuss further details.</p>
        <p>Best Regards,<br>Interior Solutions Team</p>
    ";
    $mail->Body = $bodyUser;
    $mail->send();

    // 8b. Send email to multiple admins
    $admin_emails = ["rarrvr66@gmail.com", "raviramakrishna2006@gmail.com"];
    $mail->clearAddresses();
    $mail->Subject = "New Booking Received - Interior Solutions";
    $bodyAdmin = "
        <h2>New Booking Received</h2>
        <p>A new booking has been placed by <strong>$name</strong>.</p>
        <h3>User Details:</h3>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $phone</p>
        <p><strong>Country:</strong> $country</p>
        <p><strong>Address:</strong> $address</p>
        <p><strong>Project Location:</strong> $project_location</p>
        <p><strong>Payment Method:</strong> $payment_method</p>
        <h3>Ordered Designs:</h3>
        <ul>$design_list</ul>
        <p><strong>Total Price:</strong> ₹$mail_total</p>
        <p>Check the admin panel for more details.</p>
    ";
    $mail->Body = $bodyAdmin;
    foreach ($admin_emails as $admin) {
        $mail->addAddress($admin);
    }
    $mail->send();

} catch (Exception $e) {
    // You can log the error if needed:
    error_log("Mailer Error: " . $mail->ErrorInfo);
}

$conn->close();

// 9. Return success response for AJAX
echo "success";
?>
