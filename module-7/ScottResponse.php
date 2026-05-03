<?php
/*
 * File:        ScottResponse.php
 * Author:      Scott
 * Date:        2026
 * Description: Receives POST data from ScottForm.html, validates all seven
 *              fields, and either displays the submitted data or shows errors.
 *
 * Fields validated:
 *   1. full_name  - text,   cannot be blank
 *   2. email      - email,  must pass filter_var email check
 *   3. age        - number, must be a whole number between 1 and 120
 *   4. phone      - tel,    must match pattern ###-###-####
 *   5. dob        - date,   must be a valid date and in the past
 *   6. state      - select, must be one of the allowed state codes
 *   7. fav_color  - text,   cannot be blank, letters and spaces only
 */


// STEP 1 - Make sure the page was reached via POST, not typed in directly

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ScottForm.html");
    exit();
}


// STEP 2 - Helper function to sanitize input
//          Trims whitespace and strips HTML tags to prevent XSS attacks

function clean($value) {
    return htmlspecialchars(strip_tags(trim($value)));
}


// STEP 3 - Collect and sanitize each POST field

$fullName = clean($_POST["full_name"]  ?? "");
$email    = clean($_POST["email"]      ?? "");
$age      = clean($_POST["age"]        ?? "");
$phone    = clean($_POST["phone"]      ?? "");
$dob      = clean($_POST["dob"]        ?? "");
$state    = clean($_POST["state"]      ?? "");
$favColor = clean($_POST["fav_color"]  ?? "");


// STEP 4 - Validate each field and collect any errors

$errors = [];

// --- Field 1: Full Name - must not be blank ---
if ($fullName === "") {
    $errors[] = "Full Name is required.";
}

// --- Field 2: Email - must not be blank and must be a valid email format ---
if ($email === "") {
    $errors[] = "Email Address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email Address is not valid (example: jane@example.com).";
}

// --- Field 3: Age - must be a whole number between 1 and 120 ---
if ($age === "") {
    $errors[] = "Age is required.";
} elseif (!ctype_digit($age)) {
    // ctype_digit only returns true for whole positive integers
    $errors[] = "Age must be a whole number.";
} else {
    $ageInt = (int)$age;
    if ($ageInt < 1 || $ageInt > 120) {
        $errors[] = "Age must be between 1 and 120.";
    }
}

// --- Field 4: Phone - must match the format ###-###-#### ---
if ($phone === "") {
    $errors[] = "Phone Number is required.";
} elseif (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $phone)) {
    $errors[] = "Phone Number must be in the format ###-###-#### (e.g. 555-867-5309).";
}

// --- Field 5: Date of Birth - must be a real date and must be in the past ---
if ($dob === "") {
    $errors[] = "Date of Birth is required.";
} else {
    // DateTime::createFromFormat returns false if the string is not a valid date
    $dobObj = DateTime::createFromFormat("Y-m-d", $dob);
    if (!$dobObj) {
        $errors[] = "Date of Birth is not a valid date.";
    } else {
        $today = new DateTime("today");
        if ($dobObj >= $today) {
            $errors[] = "Date of Birth must be in the past.";
        }
    }
}

// --- Field 6: State - must be one of the values from the dropdown ---
$validStates = ["AL","AK","AZ","CA","CO","FL","GA","HI","ID","IL","NY","OR","TX","WA","WI"];
if ($state === "") {
    $errors[] = "Please select a State.";
} elseif (!in_array($state, $validStates)) {
    $errors[] = "The selected State is not valid.";
}

// --- Field 7: Favorite Color - must not be blank, letters and spaces only ---
if ($favColor === "") {
    $errors[] = "Favorite Color is required.";
} elseif (!preg_match('/^[a-zA-Z\s]+$/', $favColor)) {
    $errors[] = "Favorite Color must contain letters and spaces only.";
}


// STEP 5 - Format the date for display (e.g. "January 15, 2000")

$dobFormatted = "";
if (isset($dobObj) && $dobObj instanceof DateTime) {
    $dobFormatted = $dobObj->format("F j, Y");
}


// STEP 6 - Map the two-letter state code to the full state name

$stateNames = [
    "AL" => "Alabama",    "AK" => "Alaska",     "AZ" => "Arizona",
    "CA" => "California", "CO" => "Colorado",   "FL" => "Florida",
    "GA" => "Georgia",    "HI" => "Hawaii",     "ID" => "Idaho",
    "IL" => "Illinois",   "NY" => "New York",   "OR" => "Oregon",
    "TX" => "Texas",      "WA" => "Washington", "WI" => "Wisconsin"
];
$stateName = $stateNames[$state] ?? $state;

?>
<!DOCTYPE html>
<!--
    The PHP above runs first, then this HTML is sent to the browser.
    The page title and content change depending on whether there were errors.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo empty($errors) ? "Submission Received" : "Form Errors"; ?></title>
</head>
<body>

<?php

// STEP 7 - Display errors if any exist, otherwise show the submitted data

if (!empty($errors)) {
    // ---- Errors found - show the error list ----
    echo "<h1>Please fix the following errors:</h1>";
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li>" . $err . "</li>";
    }
    echo "</ul>";
    echo '<a href="localhost/ScottForm.html">Go back to the form</a>';

} else {
    // ---- No errors - display the submitted data ----
    echo "<h1>Submission Received!</h1>";
    echo "<p>Here is the information you submitted:</p>";

    echo "<table border='1' cellpadding='6' cellspacing='0'>";
    echo "<tr><th>Field</th><th>Value</th></tr>";
    echo "<tr><td>Full Name</td><td>" . $fullName . "</td></tr>";
    echo "<tr><td>Email Address</td><td>" . $email . "</td></tr>";
    echo "<tr><td>Age</td><td>" . (int)$age . "</td></tr>";
    echo "<tr><td>Phone Number</td><td>" . $phone . "</td></tr>";
    echo "<tr><td>Date of Birth</td><td>" . $dobFormatted . "</td></tr>";
    echo "<tr><td>State</td><td>" . $stateName . " (" . $state . ")</td></tr>";
    echo "<tr><td>Favorite Color</td><td>" . $favColor . "</td></tr>";
    echo "</table>";

    echo '<br><a href="ScottForm.html">Submit another response</a>';
}
?>

</body>
</html>