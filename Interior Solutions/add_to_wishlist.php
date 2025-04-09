<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interior_solutions";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "not_logged_in";
    exit;
}

$user_id = $_SESSION['user_id'];
$design_id = isset($_POST['design_id']) ? $_POST['design_id'] : '';

if (!$design_id) {
    echo "error";
    exit();
}

// Check if the design is already in the wishlist
$checkSql = "SELECT * FROM wishlist WHERE user_id = ? AND design_id = ?";
$stmt = $conn->prepare($checkSql);
$stmt->bind_param("ii", $user_id, $design_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "already_exists"; // Design is already in wishlist
    exit();
}

// Insert into wishlist
$sql = "INSERT INTO wishlist (user_id, design_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $design_id);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "error";
}

$stmt->close();
$conn->close();
?>