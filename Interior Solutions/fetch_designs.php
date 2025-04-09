<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "interior_solutions";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['category']) || !isset($_GET['design_type'])) {
    echo "Invalid request";
    exit();
}

$category = filter_var($_GET['category'], FILTER_SANITIZE_STRING);
$design_type = filter_var($_GET['design_type'], FILTER_SANITIZE_STRING);
$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 0;
$limit = 3;

$sql = "SELECT * FROM designs WHERE category = ? AND design_type = ? LIMIT ? OFFSET ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $category, $design_type, $limit, $offset);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<a href="#" class="image-box" 
                data-id="' . htmlspecialchars($row['id']) . '" 
                data-image="' . htmlspecialchars($row['image']) . '" 
                data-name="' . htmlspecialchars($row['name']) . '" 
                data-description="' . htmlspecialchars($row['description']) . '" 
                data-price="' . htmlspecialchars($row['price']) . '" 
                data-likes="' . htmlspecialchars($row['likes']) . '" 
                data-used="' . htmlspecialchars($row['used_count']) . '">
                <img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '">
                <span>' . htmlspecialchars($row['name']) . '</span>
            </a>';
    }
} else {
    echo "";
}
$conn->close();
?>
