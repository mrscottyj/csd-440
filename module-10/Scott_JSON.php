<?php
/*
    File: Scott_JSON.php
    Author: Scott
    Date: 2026
    Description: Receives the form data from Scott_JSON_form.php,
    checks that all fields were filled in, then encodes the data
    to JSON using json_encode() and displays it on the page.
    If something is missing or invalid, it shows an error instead.
*/
 
// If someone opens this page directly without submitting the form, send them back
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: Scott_JSON_form.php");
    exit();
}
 
// Grab each field from the form and clean it up with trim()
$firstName  = trim($_POST["first_name"]);
$lastName   = trim($_POST["last_name"]);
$email      = trim($_POST["email"]);
$phone      = trim($_POST["phone"]);
$dob        = trim($_POST["dob"]);
$age        = trim($_POST["age"]);
$occupation = trim($_POST["occupation"]);
$program    = trim($_POST["program"]);
$city       = trim($_POST["city"]);
$bio        = trim($_POST["bio"]);
 
// Use an array to hold any error messages we find
$errors = array();
 
// Check that none of the fields are empty
if ($firstName == "")  $errors[] = "First name is required.";
if ($lastName == "")   $errors[] = "Last name is required.";
if ($email == "")      $errors[] = "Email is required.";
if ($phone == "")      $errors[] = "Phone number is required.";
if ($dob == "")        $errors[] = "Date of birth is required.";
if ($age == "")        $errors[] = "Age is required.";
if ($occupation == "") $errors[] = "Occupation is required.";
if ($program == "")    $errors[] = "Program is required.";
if ($city == "")       $errors[] = "City is required.";
if ($bio == "")        $errors[] = "Bio is required.";
 
// Extra check: make sure the email format looks right (has an @ sign, etc.)
if ($email != "" && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email address format is not valid.";
}
 
// Extra check: make sure age is actually a number between 1 and 120
if ($age != "" && (!is_numeric($age) || $age < 1 || $age > 120)) {
    $errors[] = "Age must be a number between 1 and 120.";
}
 
// If there are errors, show them and stop here
if (count($errors) > 0) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scott JSON - Error</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        ul { color: red; }
    </style>
</head>
<body>
 
    <h2>There was a problem with your submission</h2>
    <ul>
        <?php foreach ($errors as $error) { echo "<li>$error</li>"; } ?>
    </ul>
    <a href="Scott_JSON_form.php">Go back to the form</a>
 
</body>
</html>
<?php
    exit();
}
 
// No errors, so put the data into an array
$userData = array(
    "first_name"    => $firstName,
    "last_name"     => $lastName,
    "email"         => $email,
    "phone"         => $phone,
    "date_of_birth" => $dob,
    "age"           => (int)$age,   // cast to int so it shows as a number in JSON
    "occupation"    => $occupation,
    "program"       => $program,
    "city"          => $city,
    "bio"           => $bio
);
 
// Encode the array to JSON
// JSON_PRETTY_PRINT makes it readable with indentation and line breaks
$jsonResult = json_encode($userData, JSON_PRETTY_PRINT);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scott JSON - Output</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        pre  { background-color: #f4f4f4; padding: 15px; display: inline-block; }
    </style>
</head>
<body>
 
    <h2>Form submitted successfully!</h2>
    <p>Here is your data encoded as JSON:</p>
 
    <!-- pre tag keeps the indentation from JSON_PRETTY_PRINT intact -->
    <pre><?php echo htmlspecialchars($jsonResult); ?></pre>
 
    <br>
    <a href="Scott_JSON_form.php">Go back to the form</a>
 
</body>
</html>