<?php
/*
 * Programmer: Scott
 * Date: May 7th, 2026
 * File: ScottQueryTable.php
 * Description: Connects to the baseball_01 database, queries the
 *              favorite_games table, and displays the results on the page.
 */
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Query Table</title>
    <style>
        /* Just a basic table style so the output is readable */
        table { border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px 12px; text-align: left; }
        th { background-color: #ddd; }
    </style>
</head>
<body>
 
<h2>Query Table - favorite_games</h2>
 
<?php
// Database connection settings
$host = "localhost";
$user = "student1";
$pass = "pass";
$db   = "baseball_01";
 
// Connect to the database
$conn = mysqli_connect($host, $user, $pass, $db);
 
// Check connection before going any further
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected to database successfully.<br><br>";
 
// Query all rows from the table, ordered by rating descending
$sql    = "SELECT * FROM favorite_games ORDER BY rating DESC";
$result = mysqli_query($conn, $sql);
 
// Check how many rows came back
$rowCount = mysqli_num_rows($result);
 
if ($rowCount > 0) {
    echo "Found $rowCount games in the table:<br><br>";
 
    // Build an HTML table to display the results
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Release Year</th>
            <th>Rating</th>
            <th>Multiplayer</th>
          </tr>";
 
    // Loop through each row and print it out
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        // Convert the 1/0 multiplayer field to something readable
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
    // No rows means either the table is empty or something went wrong
    echo "No records found. Make sure you ran ScottPopulateTable.php first.";
}
 
// Close the connection
mysqli_close($conn);
?>
 
</body>
</html>