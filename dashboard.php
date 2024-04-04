<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Game Library</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Game Library</h1>

        <!-- Add Game Form -->
        <form action="add_game.php" method="post" class="mt-4">
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="Enter game title" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Add Game</button>
                </div>
            </div>
        </form>

        <!-- Display Game List with Edit and Remove Buttons -->
        <div id="gameList" class="mt-4">
            <!-- Display game list dynamically here -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
