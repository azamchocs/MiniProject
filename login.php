<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection code
    include 'db_connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password match in the database
    $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Redirect to dashboard or homepage after login
        exit();
    } else {
        // Login failed
        header("Location: index.php?login_error=true"); // Redirect back to index with error flag
        exit();
    }
} else {
    header("Location: index.php"); // Redirect back to index if accessed directly
    exit();
}
?>
