$(document).ready(function() {
    // Fetch game list from the server when the page loads
    fetchGames();

    // Event listener for add game button
    $('#addGameBtn').click(function() {
        // Display form/modal for adding game
        // You can implement this using JavaScript
    });

    // Event listener for remove game button
    $(document).on('click', '.removeGameBtn', function() {
        var gameId = $(this).data('id');
        // Display confirmation dialog
        if (confirm("Are you sure you want to remove this game?")) {
            // Send request to server to remove game
            removeGame(gameId);
        }
    });

    // Event listener for edit game button
    $(document).on('click', '.editGameBtn', function() {
        var gameId = $(this).data('id');
        // Display form/modal for editing game
        // You can implement this using JavaScript
    });
});

function fetchGames() {
    $.ajax({
        url: 'fetch_games.php',
        method: 'GET',
        success: function(response) {
            $('#gameList').html(response);
        },
        error: function(xhr, status, error) {
            console.error("Error fetching games:", error);
        }
    });
}

function removeGame(gameId) {
    $.ajax({
        url: 'remove_game.php',
        method: 'POST',
        data: { id: gameId },
        success: function(response) {
            fetchGames(); // Refresh game list after removal
        },
        error: function(xhr, status, error) {
            console.error("Error removing game:", error);
        }
    });
}

function editGame(gameId) {
    // Display form/modal for editing game
    // You can implement this using JavaScript
}

function addGame(gameData) {
    $.ajax({
        url: 'add_game.php',
        method: 'POST',
        data: gameData,
        success: function(response) {
            fetchGames(); // Refresh game list after addition
        },
        error: function(xhr, status, error) {
            console.error("Error adding game:", error);
        }
    });
}

$(document).ready(function() {
    // Fetch and display game list
    fetchGames();

    // Function to fetch and display game list
    function fetchGames() {
        // AJAX request to fetch game list from server
        $.ajax({
            url: 'fetch_games.php',
            type: 'GET',
            success: function(response) {
                $('#gameList').html(response);
            }
        });
    }
});
