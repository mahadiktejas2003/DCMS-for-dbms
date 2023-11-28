<?php
require('connect-mysql.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staff_id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $q = "UPDATE staff SET name='$name', age='$age', sex='$sex', email='$email', address='$address', phone='$phone' WHERE sid=$staff_id";
    $result = @mysqli_query($dbcon, $q);

    if ($result) {
        echo '<p>Staff information updated successfully.</p>';
    } else {
        echo '<p class="error">Error updating staff information.</p>';
        echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
    }
} else {
    echo '<p class="error">Invalid request. Please go back to the <a href="viewstaff.php">View Staff page</a>.</p>';
}

mysqli_close($dbcon);
?>
