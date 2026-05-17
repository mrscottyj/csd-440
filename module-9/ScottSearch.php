<?php
/*
 * Programmer: Scott
 * Date: 2026-05-17
 * File: ScottSearch.php
 * Description: Search the favorite_games table by title or genre.
 */
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Games</title>
</head>
<body>
 
<h1>Search Games</h1>
 
<form method="GET" action="ScottSearch.php">
    <label for="search">Search by title or genre:</label><br><br>
    <input type="text" id="search" name="search" 
           value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    <input type="submit" value="Search">
</form>
 
<br>
 
<?php
// Only run a query if the user submitted the form
if (isset($_GET['search']) && $_GET['search'] !== '') {
 
    $host = "localhost";
    $user = "student1";
    $pass = "pass";
    $db   = "baseball_01";
 
    // Connect to the database
    $conn = mysqli_connect($host, $user, $pass, $db);
 
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
 
    // Sanitize the input before using it in a query
    $search = mysqli_real_escape_string($conn, $_GET['search']);
 
    // Search both title and genre columns
    $sql    = "SELECT * FROM favorite_games WHERE title LIKE '%$search%' OR genre LIKE '%$search%' ORDER BY rating DESC";
    $result = mysqli_query($conn, $sql);
    $count  = mysqli_num_rows($result);
 
    echo "<p>Results for \"" . htmlspecialchars($_GET['search']) . "\": $count found</p>";
 
    if ($count > 0) {
        echo "<table border='1' cellpadding='6'>";
        echo "<tr>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Release Year</th>
                <th>Rating</th>
                <th>Multiplayer</th>
              </tr>";
 
        // Loop through each result row
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $mp = ($row['multiplayer'] == 1) ? "Yes" : "No";
            echo "<tr>
                    <td>{$row['game_id']}</td>
                    <td>{$row['title']}</td>
                    <td>{$row['genre']}</td>
                    <td>{$row['release_year']}</td>
                    <td>{$row['rating']}</td>
                    <td>$mp</td>
                  </tr>";
        }
 
        echo "</table>";
    } else {
        echo "<p>No results found. Try a different keyword.</p>";
    }
 
    mysqli_close($conn);
}
?>
 
<br><a href="ScottIndex.php">Back to Home</a>
 
</body>
</html>