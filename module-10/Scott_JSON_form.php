<?php
/*
    File: Scott_JSON_form.php
    Author: Scott
    Date: 2026
    Description: A simple HTML form that collects user info and sends
    it to Scott_JSON.php to be encoded as JSON and displayed.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scott JSON Form</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea { width: 300px; padding: 5px; margin-top: 3px; }
        input[type="submit"] { margin-top: 20px; padding: 8px 20px; cursor: pointer; }
    </style>
</head>
<body>
 
<h2>User Info Form</h2>
<p>Fill out all fields and click Submit.</p>
 
<!-- Send form data to Scott_JSON.php using POST -->
<form action="Scott_JSON.php" method="POST">
 
    <!-- Field 1 -->
    <label>First Name</label>
    <input type="text" name="first_name" required>
 
    <!-- Field 2 -->
    <label>Last Name</label>
    <input type="text" name="last_name" required>
 
    <!-- Field 3 -->
    <label>Email</label>
    <input type="email" name="email" required>
 
    <!-- Field 4 -->
    <label>Phone Number</label>
    <input type="tel" name="phone" required>
 
    <!-- Field 5 -->
    <label>Date of Birth</label>
    <input type="date" name="dob" required>
 
    <!-- Field 6 -->
    <label>Age</label>
    <input type="number" name="age" min="1" max="120" required>
 
    <!-- Field 7 -->
    <label>Occupation</label>
    <input type="text" name="occupation" required>
 
    <!-- Field 8 -->
    <label>Program of Study</label>
    <select name="program" required>
        <option value="">-- Select --</option>
        <option>Software Development</option>
        <option>Cybersecurity</option>
        <option>Information Technology</option>
        <option>Networking</option>
        <option>Other</option>
    </select>
 
    <!-- Field 9 -->
    <label>City</label>
    <input type="text" name="city" required>
 
    <!-- Field 10 -->
    <label>Short Bio</label>
    <textarea name="bio" rows="3" required></textarea>
 
    <br>
    <input type="submit" value="Submit">
 
</form>
 
</body>
</html>