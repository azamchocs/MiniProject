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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['config'])) {
    $id = $_POST['id'];
    $config = $_POST['config'];

    // Update game configuration in database
    $sql = "UPDATE games SET config='$config' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Game configuration updated successfully";
    } else {
        echo "Error updating game configuration: " . $conn->error;
    }
} else {
    echo "Invalid request";
}

// Close connection
$conn->close();
?>
