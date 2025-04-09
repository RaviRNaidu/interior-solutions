<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "not_logged_in";
    exit();
}

$user_id = $_SESSION['user_id'];
$cart_id = isset($_POST['cart_id']) ? $_POST['cart_id'] : null;

if (!$cart_id) {
    echo "error";
    exit();
}

$conn = new mysqli("localhost", "root", "", "interior_solutions");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Remove item from cart
$sql = "DELETE FROM cart WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $cart_id, $user_id);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>
