<?php
$host = "localhost"; // Database host
$user = "root"; // Database username (default for XAMPP)
$password = ""; // Database password (default is empty in XAMPP)
$database = "interior_solutions"; // Replace with your actual database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
