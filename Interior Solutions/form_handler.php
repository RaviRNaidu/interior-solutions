<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoload

$servername = "localhost";
$username = "root";
$password = "";
$database = "interior_solutions";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['project_location'], $_POST['form_type'])) {
    die("Error: Missing form data.");
}

$name = $conn->real_escape_string($_POST['name']);
$phone = $conn->real_escape_string($_POST['phone']);
$email = $conn->real_escape_string($_POST['email']);
$project_location = $conn->real_escape_string($_POST['project_location']);
$form_type = $conn->real_escape_string($_POST['form_type']);

// Check for duplicate entry
$checkQuery = "SELECT * FROM form_submissions WHERE form_type='$form_type' AND name='$name' AND phone='$phone' AND email='$email' AND project_location='$project_location'";
$result = $conn->query($checkQuery);

if ($result->num_rows > 0) {
    echo "Duplicate entry detected!";
} else {
    $sql = "INSERT INTO form_submissions (form_type, name, phone, email, project_location) 
            VALUES ('$form_type', '$name', '$phone', '$email', '$project_location')";

    if ($conn->query($sql) === TRUE) {
        sendThankYouEmail($email, $name);
        sendAdminNotificationEmail($name, $phone, $email, $project_location, $form_type);
        echo "Success";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();

function sendThankYouEmail($recipientEmail, $recipientName) {
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rarrvr66@gmail.com'; // Your email
        $mail->Password   = 'pzmt vzlb jhyw vgon'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom('your-email@gmail.com', 'Interior Solutions');
        $mail->addAddress($recipientEmail, $recipientName);

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Thank You for Choosing Interior Solutions!';
        $mail->Body    = "
            <h3>Dear $recipientName,</h3>
            <p>Thank you for reaching out to Interior Solutions.</p>
            <p>We have received your details and will get in touch with you as soon as possible.</p>
            <p>Best regards,<br>Interior Solutions Team</p>
        ";

        $mail->send();
    } catch (Exception $e) {
        error_log("User email could not be sent. Error: " . $mail->ErrorInfo);
    }
}

function sendAdminNotificationEmail($name, $phone, $email, $project_location, $form_type) {
    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rarrvr66@gmail.com'; // Your email
        $mail->Password   = 'pzmt vzlb jhyw vgon'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender
        $mail->setFrom('your-email@gmail.com', 'Interior Solutions');

        // Add multiple admin recipients
        $adminEmails = ['rarrvr66@gmail.com', 'raviramakrishna2006@gmail.com']; // Replace with actual emails
        foreach ($adminEmails as $adminEmail) {
            $mail->addAddress($adminEmail);
        }

        // Email content
        $mail->isHTML(true);
        $mail->Subject = "New Inquiry: $form_type";
        $mail->Body    = "
            <h3>New User Inquiry</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Project Location:</strong> $project_location</p>
            <p><strong>Form Type:</strong> $form_type</p>
            <p>Please contact the user as soon as possible.</p>
        ";

        $mail->send();
    } catch (Exception $e) {
        error_log("Admin email could not be sent. Error: " . $mail->ErrorInfo);
    }
}
?>
