<!DOCTYPE html>
<!--
    File:        ScottForm.html
    Author:      Scott
    Date:        2026
    Description: HTML form that collects seven fields of user data.
                 Submits to ScottResponse.php for validation and display.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scott's Form</title>
</head>
<body>

    <h1>User Info Form</h1>
    <p>Please fill out all fields and click Submit.</p>

    <!--
        action points to ScottResponse.php which handles validation.
        method POST sends data in the request body, not the URL.
    -->
    <form action="ScottResponse.php" method="POST">

        <!-- Field 1: Full Name (text) -->
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" maxlength="80"><br><br>

        <!-- Field 2: Email Address (email) -->
        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email"><br><br>

        <!-- Field 3: Age (number) -->
        <label for="age">Age (1-120):</label><br>
        <input type="number" id="age" name="age" min="1" max="120"><br><br>

        <!-- Field 4: Phone Number (tel) -->
        <label for="phone">Phone Number (###-###-####):</label><br>
        <input type="tel" id="phone" name="phone" placeholder="555-867-5309"><br><br>

        <!-- Field 5: Date of Birth (date) -->
        <label for="dob">Date of Birth:</label><br>
        <input type="date" id="dob" name="dob"><br><br>

        <!-- Field 6: State (select dropdown) -->
        <label for="state">State:</label><br>
        <select id="state" name="state">
            <option value="">-- Select a State --</option>
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="NY">New York</option>
            <option value="OR">Oregon</option>
            <option value="TX">Texas</option>
            <option value="WA">Washington</option>
            <option value="WI">Wisconsin</option>
        </select><br><br>

        <!-- Field 7: Favorite Color (text) -->
        <label for="fav_color">Favorite Color:</label><br>
        <input type="text" id="fav_color" name="fav_color" maxlength="30"><br><br>

        <!-- Submit button -->
        <input type="submit" value="Submit">

    </form>

</body>
</html>