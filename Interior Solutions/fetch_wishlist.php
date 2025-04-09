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

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "error", "message" => "Please log in to view your wishlist."]);
    exit;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT wishlist.id as wishlist_id, designs.id as design_id, designs.name, designs.image, designs.price 
        FROM wishlist 
        JOIN designs ON wishlist.design_id = designs.id 
        WHERE wishlist.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$wishlist_items = [];
while ($row = $result->fetch_assoc()) {
    $wishlist_items[] = $row;
}

echo json_encode(["status" => "success", "data" => $wishlist_items]);
$conn->close();
?>
