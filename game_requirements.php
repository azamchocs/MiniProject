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

// Fetch and display game system requirements
$sql = "SELECT * FROM game_requirements";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<h2>" . $row["title"] . "</h2>";
        echo "<p>MINIMUM:</p>";
        echo "<p>" . $row["minimum_requirements"] . "</p>";
        echo "<p>RECOMMENDED:</p>";
        echo "<p>" . $row["recommended_requirements"] . "</p>";
    }
} else {
    echo "No game requirements found";
}

// Close connection
$conn->close();
?>
