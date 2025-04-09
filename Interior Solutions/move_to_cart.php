<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "not_logged_in";
    exit();
}

$user_id = $_SESSION['user_id'];
$wishlist_id = isset($_POST['wishlist_id']) ? $_POST['wishlist_id'] : null;
$design_id = isset($_POST['design_id']) ? $_POST['design_id'] : null;

if (!$wishlist_id || !$design_id) {
    echo "error";
    exit();
}

$conn = new mysqli("localhost", "root", "", "interior_solutions");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the design is already in the cart
$check_sql = "SELECT id FROM cart WHERE user_id = ? AND design_id = ?";
$check_stmt = $conn->prepare($check_sql);
$check_stmt->bind_param("ii", $user_id, $design_id);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    echo "exists"; // Item already in cart
} else {
    // Move design from wishlist to cart
    $insert_sql = "INSERT INTO cart (user_id, design_id) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ii", $user_id, $design_id);

    if ($stmt->execute()) {
        // Remove from wishlist
        $delete_sql = "DELETE FROM wishlist WHERE id = ?";
        $stmt = $conn->prepare($delete_sql);
        $stmt->bind_param("i", $wishlist_id);
        $stmt->execute();

        echo "success";
    } else {
        echo "error";
    }
}

$stmt->close();
$conn->close();
?>
