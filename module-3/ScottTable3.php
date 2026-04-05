<!DOCTYPE html>
<html lang="en">
<head>
    <!--
        File: ScottTable3.php
        Author: Scott
        Date: April 1st, 2026
        Description: Generates a 5x5 HTML table where each cell displays
                     the sum of two random numbers using an external function.
    -->
    <meta charset="UTF-8">
    <title>Random Number Table</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 50px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">PHP Random Number Table</h2>

<?php
// Load the external file containing the addNumbers function
require_once 'addNumbers.php';
?>

<table>
    <?php
    // Outer loop generates each row
    for ($row = 1; $row <= 5; $row++) { ?>
        <tr>
            <?php
            // Inner loop generates each cell in the row
            for ($col = 1; $col <= 5; $col++) {

                // Generate two random numbers between 1 and 50
                $num1 = rand(1, 50);
                $num2 = rand(1, 50);

                // Call the external function to get the sum
                $sum = addNumbers($num1, $num2);
            ?>
                <td>
                    <?php echo $sum; ?>
                </td>
            <?php } ?>
        </tr>
    <?php } ?>
</table>

</body>
</html>