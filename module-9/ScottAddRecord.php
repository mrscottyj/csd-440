<?php
/*
 * Programmer: Scott
 * Date: 2026-05-17
 * File: ScottAddRecord.php
 * Description: Form to add a new game record to the favorite_games table.
 *              Handles both displaying the form and processing the submission.
 */
 
$message = "";
 
// Only process if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $host = "localhost";
    $user = "student1";
    $pass = "pass";
    $db   = "baseball_01";
 
    $conn = mysqli_connect($host, $user, $pass, $db);
 
    if (!$conn) {
        $message = "Connection failed: " . mysqli_connect_error();
    } else {
 
        // Sanitize each field from the form
        $title       = mysqli_real_escape_string($conn, $_POST['title']);
        $genre       = mysqli_real_escape_string($conn, $_POST['genre']);
        $year        = (int) $_POST['release_year'];
        $rating      = (float) $_POST['rating'];
        $multiplayer = isset($_POST['multiplayer']) ? 1 : 0;
 
        // Title is required before we do anything
        if ($title === '') {
            $message = "Error: Title is required.";
        } else {
            $sql = "INSERT INTO favorite_games (title, genre, release_year, rating, multiplayer)
                    VALUES ('$title', '$genre', $year, $rating, $multiplayer)";
 
            if (mysqli_query($conn, $sql)) {
                $message = "\"$title\" added successfully!";
            } else {
                $message = "Error: " . mysqli_error($conn);
            }
        }
 
        mysqli_close($conn);
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add a Game</title>
</head>
<body>
 
<h1>Add a New Game</h1>
 
<?php if ($message !== '') echo "<p>$message</p>"; ?>
 
<form method="POST" action="ScottAddRecord.php">
 
    <label for="title">Title (required):</label><br>
    <input type="text" id="title" name="title" maxlength="100"><br><br>
 
    <label for="genre">Genre:</label><br>
    <input type="text" id="genre" name="genre" maxlength="50"><br><br>
 
    <label for="release_year">Release Year:</label><br>
    <input type="number" id="release_year" name="release_year" value="2024"><br><br>
 
    <label for="rating">Rating (0.0 - 10.0):</label><br>
    <input type="number" id="rating" name="rating" step="0.1" min="0" max="10" value="8.0"><br><br>
 
    <label>
        <input type="checkbox" name="multiplayer" value="1"> Multiplayer?
    </label><br><br>
 
    <input type="submit" value="Add Game">
 
</form>
 
<br><a href="ScottIndex.php">Back to Home</a>
 
</body>
</html>