<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scott Customers</title>
</head>
<body>

<?php

// Create the customer list
$customers = [
    ["first_name" => "Greg",   "last_name" => "Saunders", "age" => 34, "phone" => "714-555-0192"],
    ["first_name" => "Paul",   "last_name" => "Delgado",  "age" => 27, "phone" => "949-555-0347"],
    ["first_name" => "Tom",   "last_name" => "Smith",  "age" => 45, "phone" => "562-555-0281"],
    ["first_name" => "Sandy",  "last_name" => "Knocks",      "age" => 31, "phone" => "213-555-0174"],
    ["first_name" => "Derek",   "last_name" => "DePaul",   "age" => 52, "phone" => "760-555-0463"],
    ["first_name" => "Ash",  "last_name" => "Myers",   "age" => 29, "phone" => "818-555-0335"],
    ["first_name" => "Marcus",  "last_name" => "Paul",     "age" => 38, "phone" => "310-555-0512"],
    ["first_name" => "Fritz",  "last_name" => "Menne",    "age" => 23, "phone" => "619-555-0147"],
    ["first_name" => "Josie",   "last_name" => "Kennedy",    "age" => 41, "phone" => "858-555-0229"],
    ["first_name" => "Jeffery",  "last_name" => "Simpson",  "age" => 36, "phone" => "951-555-0388"],
];

// Display all customers
echo "<h2>All Customers</h2>";

foreach ($customers as $customer) {
    echo $customer["first_name"] . " " . $customer["last_name"] .
         " | Age: " . $customer["age"] .
         " | Phone: " . $customer["phone"] . "<br>";
}

// Find a customer by last name
echo "<h2>Search by Last Name: Knocks</h2>";

foreach ($customers as $customer) {
    if ($customer["last_name"] == "Knocks") {
        echo $customer["first_name"] . " " . $customer["last_name"] .
             " | Age: " . $customer["age"] .
             " | Phone: " . $customer["phone"] . "<br>";
    }
}

// Find all customers over age 35
echo "<h2>Customers Over Age 35</h2>";

foreach ($customers as $customer) {
    if ($customer["age"] > 35) {
        echo $customer["first_name"] . " " . $customer["last_name"] .
             " | Age: " . $customer["age"] .
             " | Phone: " . $customer["phone"] . "<br>";
    }
}

// Find a customer by first name
echo "<h2>Search by First Name: Ash</h2>";

foreach ($customers as $customer) {
    if ($customer["first_name"] == "Ash") {
        echo $customer["first_name"] . " " . $customer["last_name"] .
             " | Age: " . $customer["age"] .
             " | Phone: " . $customer["phone"] . "<br>";
    }
}

?>

</body>
</html>