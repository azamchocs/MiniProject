<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection code
    include 'db_connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username is already taken
    $sql = "SELECT * FROM accounts WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Username already exists
        header("Location: index.php?register_error=true"); // Redirect back to index with error flag
        exit();
    } else {
        // Insert new user into database
        $sql = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            // Registration successful
            $_SESSION['username'] = $username;
            header("Location: login.php?register=success"); // Redirect to login page with success flag
            exit();
        } else {
            // Error inserting user
            header("Location: index.php?register_error=true"); // Redirect back to index with error flag
            exit();
        }
    }
} else {
    header("Location: index.php"); // Redirect back to index if accessed directly
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Game Library</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script>
    // Function to display success message
    function showSuccessMessage(message) {
        var alertDiv = document.createElement('div');
        alertDiv.classList.add('alert', 'alert-success', 'text-center', 'mt-4');
        alertDiv.textContent = message;

        document.body.appendChild(alertDiv);

        // Remove the alert after a certain duration (e.g., 5 seconds)
        setTimeout(function() {
            alertDiv.remove();
        }, 5000);
    }

    // Check if registration success parameter is present in URL
    window.onload = function() {
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('register') && urlParams.get('register') === 'success') {
            showSuccessMessage('Registration successful! You can now log in.');
        }
    };
    </script>
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Register</h1>

        <!-- Registration Form -->
        <form action="register.php" method="post" class="mt-4">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
