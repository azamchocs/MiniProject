<?php
// Include database connection code
include 'db_connection.php';

// Fetch game list from database
$sql = "SELECT * FROM games";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output game list
    while($row = $result->fetch_assoc()) {
        echo '<div class="game">
                  <span class="title">' . $row['title'] . '</span>
                  <div class="buttons">
                      <button class="btn btn-sm btn-info edit-btn">Edit Config</button>
                      <button class="btn btn-sm btn-danger remove-btn">Remove</button>
                  </div>
              </div>';
    }
} else {
    echo 'No games found.';
}

// Close database connection
$conn->close();
?>
