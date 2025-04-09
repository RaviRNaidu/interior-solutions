<?php
session_start();

// Ensure the user is authenticated
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(['error' => 'User not authenticated']);
    exit();
}

// Function to generate a random 6-character alphanumeric code
function generateRandomCode($length = 6) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $charactersLength = strlen($characters);
    $randomCode = '';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomCode;
}

$upi_code = generateRandomCode();

// Store the generated code in session for later verification
$_SESSION['upi_generated_code'] = $upi_code;

// Build the QR code URL using api.qrserver.com
$qrImageUrl = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($upi_code);

// Return the UPI code and the QR image URL as JSON
header('Content-Type: application/json');
echo json_encode(['code' => $upi_code, 'qr' => $qrImageUrl]);
?>
