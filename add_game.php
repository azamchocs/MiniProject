<?php
// Database connection parameters
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = $_POST['title'];

    // Insert game title into database
    $sql = "INSERT INTO games (title) VALUES ('$title')";
    if ($conn->query($sql) === TRUE) {
        echo "Game added successfully";
    } else {
        echo "Error adding game: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close connection
$conn->close();
?>
