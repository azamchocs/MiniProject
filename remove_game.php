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

// Check if game ID is received
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    // Remove game from database
    $sql = "DELETE FROM games WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Game removed successfully";
    } else {
        echo "Error removing game: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close connection
$conn->close();
?>
