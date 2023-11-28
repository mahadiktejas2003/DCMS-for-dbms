<?php
require('connect-mysql.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $staff_id = $_GET['id'];

    $q = "DELETE FROM staff WHERE sid = $staff_id";
    $result = @mysqli_query($dbcon, $q);

    if ($result) {
        echo '<p>Staff information deleted successfully.</p>';
    } else {
        echo '<p class="error">Error deleting staff information.</p>';
        echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
    }
} else {
    echo '<p class="error">Invalid request. Please go back to the <a href="viewstaff.php">View Staff page</a>.</p>';
}

mysqli_close($dbcon);
?>
