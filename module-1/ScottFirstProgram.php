<?php
/*
 * Author: Scott Johnson
 * Date: March 20th, 2026
 * Description: This is my first PHP program. It displays a greeting
 *              message and the current date using PHP code snippets
 *              embedded in a standard HTML page.
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First PHP Program</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #333333;
        }
        p {
            font-size: 18px;
            color: #555555;
        }
    </style>
</head>
<body>

    <h1>Welcome to My First PHP Program</h1>

    <?php
        // PHP Snippet 1: Display a personalized greeting
        $name = "Scott";
        echo "<p>Hello, my name is " . $name . " and this is my first PHP program!</p>";
    ?>

    <?php
        // PHP Snippet 2: Display the current date and time
        $currentDate = date("l, F j, Y");
        echo "<p>Today is " . $currentDate . ".</p>";
    ?>

    <p>This page was built using HTML and PHP running on a local XAMPP server.</p>

</body>
</html>