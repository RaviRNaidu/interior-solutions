<?php
session_start(); // Start session to access user info

// Uncomment below during development to debug
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // DB credentials
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "interior_solutions";

    // Connect to the database
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get email from session
    $sessionEmail = $_SESSION["email"] ?? "";

    // Get review and rating from form
    $review = trim($_POST["review"] ?? "");
    $rating = (int) ($_POST["rating"] ?? 0);

    // Basic validation
    if (empty($sessionEmail)) {
        echo "Error: User not logged in.";
    } elseif (empty($review) || $rating < 1 || $rating > 5) {
        echo "Error: Please provide a valid review and rating (1–5).";
    } else {
        // Fetch user from 'users' table using email
        $stmtUser = $conn->prepare("SELECT id, username, email FROM users WHERE email = ?");
        $stmtUser->bind_param("s", $sessionEmail);
        $stmtUser->execute();
        $resultUser = $stmtUser->get_result();

        if ($resultUser->num_rows > 0) {
            $user = $resultUser->fetch_assoc();
            $userId = $user['id'];
            $username = $user['username'];
            $email = $user['email'];

            // Insert review with foreign key (user_id)
            $stmtReview = $conn->prepare(
                "INSERT INTO reviews (user_id, name, email, review_text, rating) VALUES (?, ?, ?, ?, ?)"
            );
            $stmtReview->bind_param("isssi", $userId, $username, $email, $review, $rating);

            if ($stmtReview->execute()) {
                echo "Thank you for your review!";
            } else {
                echo "Error saving review: " . $stmtReview->error;
            }

            $stmtReview->close();
        } else {
            echo "Error: User not found.";
        }

        $stmtUser->close();
    }

    $conn->close();
    exit;
}
?>
