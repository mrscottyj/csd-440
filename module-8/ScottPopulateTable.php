<?php
/*
 * Programmer: Scott
 * Date: May 7th, 2026
 * File: ScottPopulateTable.php
 * Description: Connects to the baseball_01 database and inserts several
 *              rows of sample data into the favorite_games table.
 */
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Populate Table</title>
</head>
<body>
 
<h2>Populate Table - favorite_games</h2>
 
<?php
// Database connection settings
$host = "localhost";
$user = "student1";
$pass = "pass";
$db   = "baseball_01";
 
// Connect to the database
$conn = mysqli_connect($host, $user, $pass, $db);
 
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected to database successfully.<br><br>";
 
// Array of game data to insert
// Each entry: title, genre, release_year, rating, multiplayer (1=yes, 0=no)
$games = [
    ["The Legend of Zelda: Breath of the Wild", "Action Adventure", 2017, 9.8, 0],
    ["Halo 3",                                  "First Person Shooter", 2007, 9.5, 1],
    ["Red Dead Redemption 2",                   "Action Adventure", 2018, 9.7, 0],
    ["Minecraft",                               "Sandbox", 2011, 9.0, 1],
    ["God of War",                              "Action RPG", 2018, 9.6, 0],
    ["Elden Ring",                              "Action RPG", 2022, 9.5, 1],
];
 
// Loop through each game and insert it into the table
$successCount = 0;
 
foreach ($games as $game) {
    // Build the INSERT statement for this row
    $sql = "INSERT INTO favorite_games (title, genre, release_year, rating, multiplayer)
            VALUES ('{$game[0]}', '{$game[1]}', {$game[2]}, {$game[3]}, {$game[4]})";
 
    if (mysqli_query($conn, $sql)) {
        echo "Inserted: " . $game[0] . "<br>";
        $successCount++;
    } else {
        echo "Error inserting " . $game[0] . ": " . mysqli_error($conn) . "<br>";
    }
}
 
echo "<br>Done. $successCount rows inserted successfully.";
 
// Close the connection
mysqli_close($conn);
?>
 
</body>
</html>