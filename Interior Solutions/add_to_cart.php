<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    echo "not_logged_in";
    exit();
}

$user_id = $_SESSION['user_id'];
$design_id = isset($_POST['design_id']) ? $_POST['design_id'] : null;

if (!$design_id) {
    echo "error";
    exit();
}

$conn = new mysqli("localhost", "root", "", "interior_solutions");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the design is already in the cart
$check_sql = "SELECT * FROM cart WHERE user_id = ? AND design_id = ?";
$stmt = $conn->prepare($check_sql);
$stmt->bind_param("ii", $user_id, $design_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "already_exists";
} else {
    // Insert into cart
    $insert_sql = "INSERT INTO cart (user_id, design_id) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param("ii", $user_id, $design_id);
    
    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}

$stmt->close();
$conn->close();
?>
