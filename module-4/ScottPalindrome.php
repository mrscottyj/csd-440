<!DOCTYPE html>
<!--
    File:        Scott Palindrome.php
    Author:      Scott
    Date:        2025-04-12
    Description: This program tests six strings to determine whether
                 each one is a palindrome. Three strings are palindromes
                 and three are not. Each string is displayed forward and
                 backward along with the result of the palindrome test.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scott Palindrome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e2e;
            color: #cdd6f4;
            max-width: 680px;
            margin: 50px auto;
            padding: 0 20px;
        }

        h1 {
            font-size: 1.6em;
            border-bottom: 2px solid #89b4fa;
            padding-bottom: 10px;
            color: #89b4fa;
        }

        .card {
            background-color: #2a2a3d;
            border-left: 5px solid #585b70;
            border-radius: 4px;
            padding: 14px 18px;
            margin-bottom: 14px;
        }

        .card p {
            margin: 4px 0;
            font-size: 0.97em;
        }

        .label {
            color: #a6adc8;
            font-weight: bold;
            display: inline-block;
            width: 90px;
        }

        .pass {
            color: #a6e3a1;
            font-weight: bold;
            margin-top: 8px;
        }

        .fail {
            color: #f38ba8;
            font-weight: bold;
            margin-top: 8px;
        }

        .divider {
            border: none;
            border-top: 1px solid #45475a;
            margin: 10px 0;
        }
    </style>
</head>
<body>

<h1>Palindrome Checker</h1>

<?php

/*
 * Function: checkPalindrome
 * -------------------------
 * Strips spaces from the input string and converts it to lowercase,
 * then compares it against its own reverse. Returns true if the two
 * match and false if they do not.
 *
 * Parameters:
 *   $input (string) - The string to evaluate.
 *
 * Returns:
 *   bool - true if palindrome, false if not.
 */
function checkPalindrome($input) {
    $clean    = strtolower(str_replace(' ', '', $input));
    $backward = strrev($clean);
    return ($clean === $backward);
}

/*
 * Function: runTest
 * -----------------
 * Accepts a string, calls checkPalindrome() to evaluate it, and
 * outputs an HTML card showing the original string, the reversed
 * string, and whether the test passed or failed.
 *
 * Parameters:
 *   $word (string) - The string to display and test.
 *
 * Returns:
 *   void
 */
function runTest($word) {
    $flipped = strrev($word);
    $result  = checkPalindrome($word);

    echo "<div class='card'>";
    echo "<p><span class='label'>Forward:</span>"  . htmlspecialchars($word)    . "</p>";
    echo "<p><span class='label'>Backward:</span>" . htmlspecialchars($flipped) . "</p>";
    echo "<hr class='divider'>";

    if ($result) {
        echo "<p class='pass'>&#10003; Palindrome confirmed</p>";
    } else {
        echo "<p class='fail'>&#10007; Not a palindrome</p>";
    }

    echo "</div>";
}

// Test strings: first three are palindromes, last three are not
$strings = [
    "civic",        // palindrome
    "kayak",        // palindrome
    "noon",         // palindrome
    "bridge",       // not a palindrome
    "lantern",      // not a palindrome
    "journal"       // not a palindrome
];

foreach ($strings as $str) {
    runTest($str);
}

?>

</body>
</html>