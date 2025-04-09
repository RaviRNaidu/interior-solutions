<?php
session_start();
$conn = new mysqli("localhost", "root", "", "interior_solutions");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    echo "not_logged_in";
    exit;
}

$user_id = $_SESSION['user_id'];
// Get the wishlist ID instead of design_id
$wishlist_id = isset($_POST['wishlist_id']) ? (int)$_POST['wishlist_id'] : 0;

if ($wishlist_id === 0) {
    echo "error";
    exit;
}

// Delete by wishlist id and user id
$sql = "DELETE FROM wishlist WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $wishlist_id, $user_id);

echo ($stmt->execute()) ? "success" : "error";

$stmt->close();
$conn->close();
?>
