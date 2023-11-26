<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dental Codes</title>
    <link rel="stylesheet" type="text/css" href="dentalcodes.css">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>

<?php
// This script performs an INSERT query that adds a record to the users table.
require('connect-mysql.php'); // Make sure you have this line to include the database connection.

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Trim and sanitize input
    $code = mysqli_real_escape_string($dbcon, trim($_POST['code']));
    $unitcost = mysqli_real_escape_string($dbcon, trim($_POST['unitcost']));
    
    // Check and truncate the description to the maximum allowed length
    $maxDescriptionLength = 50; // Change this to the actual maximum length of your 'description' column
    $desc = substr(mysqli_real_escape_string($dbcon, trim($_POST['description'])), 0, $maxDescriptionLength);

    // Make the query
    $q = "INSERT INTO dentalcode (code, unitcost, description) VALUES ('$code', '$unitcost', '$desc')";

    $result = mysqli_query($dbcon, $q); // Run the query.

    if ($result) { // If it ran OK.
        header("location: admin.php");
        exit();
    } else { // If the form handler or database table contained errors
        // Display any error message
        echo '<h2 class="error">System Error</h2>
        <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';
        echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
    }

    mysqli_close($dbcon); // Close the database connection.
    exit();
} // End of the main Submit conditional.
?>

<h2 class="title">Insert Dental codes</h2>
<!--display the form on the screen-->
<form action="dentalcodes.php" method="post" class="form">
    <p><label class="label" for="code">Code</label>
        <input type="text" name="code" size="30" maxlength="30"
               value="<?php if (isset($_POST['code'])) echo htmlspecialchars($_POST['code']); ?>"></p>

    <p><label class="label" for="unitcost">Unit Cost</label>
        <input type="text" name="unitcost" size="30" maxlength="40"
               value="<?php if (isset($_POST['unitcost'])) echo htmlspecialchars($_POST['unitcost']); ?>"></p>

    <p><label class="label" for="description">Description</label>
        <input type="text" name="description" size="30" maxlength="60"
               value="<?php if (isset($_POST['description'])) echo htmlspecialchars($_POST['description']); ?>"></p>

    <p><input id="submit" type="submit" name="submit" value="Register"></p>
</form><!-- End of the page content. -->

</body>
</html>
