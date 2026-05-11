<?php
/*
 * Programmer: Scott
 * Date: May 7th 2026
 * File: ScottCreateTable.php
 * Description: Connects to the baseball_01 database and creates a table
 *              called favorite_games to store video game data.
 */
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Table</title>
</head>
<body>
 
<h2>Create Table - favorite_games</h2>
 
<?php
// Database connection settings
$host = "localhost";
$user = "student1";
$pass = "pass";
$db   = "baseball_01";
 
// Connect to the database using MySQLi
$conn = mysqli_connect($host, $user, $pass, $db);
 
// Check if connection worked
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected to database successfully.<br><br>";
 
// SQL to create the table
// Fields: game_id, title, genre, release_year, rating, multiplayer
$sql = "CREATE TABLE IF NOT EXISTS favorite_games (
    game_id      INT AUTO_INCREMENT PRIMARY KEY,
    title        VARCHAR(100) NOT NULL,
    genre        VARCHAR(50),
    release_year INT,
    rating       DECIMAL(3,1),
    multiplayer  TINYINT(1)
)";
 
// Run the query
if (mysqli_query($conn, $sql)) {
    echo "Table 'favorite_games' created successfully.";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
 
// Close the connection when done
mysqli_close($conn);
?>
 
</body>
</html>