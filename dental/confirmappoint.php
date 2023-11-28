<!doctype html>
<html lang=en>
<head>
<title>View dental codes</title>
<meta charset=utf-8>
<link rel="stylesheet" type="text/css" href="confirmappoint.css">
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="container">

<div id="content"><!-- Start of the content of the table of users page. -->
<?php
// This script retrieves all the records from the users table.
require('connect-mysql.php'); // Connect to the database.

// Fetch confirmed appointments
$confirmedQuery = "SELECT * FROM appointement WHERE status = 'CONFIRMED'";
$confirmedResult = mysqli_query($dbcon, $confirmedQuery);

// Fetch pending appointments
$pendingQuery = "SELECT * FROM appointement WHERE status IS NULL";
$pendingResult = mysqli_query($dbcon, $pendingQuery);

// Fetch cancelled appointments
$cancelledQuery = "SELECT * FROM appointement WHERE status = 'CANCELLED'";
$cancelledResult = mysqli_query($dbcon, $cancelledQuery);

// Function to display table
function displayTable($title, $result) {
    echo '<div class="table-container">'; // Container for each table
    echo '<h3 class="page">' . $title . ' Appointments</h3>';
    echo '<p></p>'; // Paragraph space
    echo '<table class="table">
        <tr class="heading">
        <td class="col head"><b>Dental Codes</b></td>
        <td class="col head"><b>Dentist</b></td>
        <td class="col head"><b>Registration Date</b></td>
        <td class="col head"><b>Time</b></td>
        <td class="col head"><b>Status</b></td>
        <td class="last"><b>Edit Status</b></td>
        </tr>';

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr class="heading2">
        <td class="col">' . $row['code'] . '</td>
        <td class="col">' . $row['dentist'] . '</td>
        <td class="col">' . $row['regdate'] . '</td>
        <td class="col">' . $row['regtime'] . '</td>
        <td class="col">' . $row['status'] . '</td>
        <td class="last1"><a class="und" href="edit_status.php?id=' . $row['ser'] . '">Edit Status</a></td>
        </tr>';
    }

    echo '</table>';
    echo '</div>'; // End of the container
}

// Display tables
if ($confirmedResult) {
    displayTable("Confirmed", $confirmedResult);
}
echo '</br>'; 
if ($pendingResult) {
    displayTable("Pending", $pendingResult);
}
echo '</br>'; 
if ($cancelledResult) {
    displayTable("Cancelled", $cancelledResult);
}
echo '</br>'; 
// Free up the resources.
mysqli_free_result($confirmedResult);
mysqli_free_result($pendingResult);
mysqli_free_result($cancelledResult);

mysqli_close($dbcon); // Close the database connection.
?>

</div><!-- End of the user’s table page content -->

</div>
</body>
</html>
