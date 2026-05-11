<?php
/*
 * Programmer: Scott
 * Date: May 7th, 2026
 * File: ScottDropTable.php
 * Description: Connects to the baseball_01 database and drops the
 *              favorite_games table if it exists.
 */
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drop Table</title>
</head>
<body>
 
<h2>Drop Table - favorite_games</h2>
 
<?php
// Database connection settings
$host = "localhost";
$user = "student1";
$pass = "pass";
$db   = "baseball_01";
 
// Connect to the database
$conn = mysqli_connect($host, $user, $pass, $db);
 
// Make sure the connection worked before doing anything else
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected to database successfully.<br><br>";
 
// SQL to drop the table -- IF EXISTS prevents an error if it's already gone
$sql = "DROP TABLE IF EXISTS favorite_games";
 
// Run the query
if (mysqli_query($conn, $sql)) {
    echo "Table 'favorite_games' dropped successfully.";
} else {
    echo "Error dropping table: " . mysqli_error($conn);
}
 
// Always close the connection when finished
mysqli_close($conn);
?>
 
</body>
</html>