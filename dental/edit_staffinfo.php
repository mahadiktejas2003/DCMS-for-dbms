<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Staff Information</title>
    <link rel="stylesheet" type="text/css" href="dentisteditadmin.css">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="container">
        <div id="content">
            <h2 class="page">Edit Staff Information</h2>

            <?php
            require('connect-mysql.php');

            if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
                $staff_id = $_GET['id'];

                $q = "SELECT * FROM staff WHERE sid = $staff_id";
                $result = @mysqli_query($dbcon, $q);

                if ($result) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $name = $row['name'];
                    $age = $row['age'];
                    $sex = $row['sex'];
                    $email = $row['email'];
                    $address = $row['address'];
                    $phone = $row['phone'];

                    echo '<form method="post" action="update_staffinfo.php">
                            <input type="hidden" name="id" value="' . $staff_id . '">
                            <label>Name:</label>
                            <input type="text" name="name" value="' . $name . '" required><br>
                            <label>Age:</label>
                            <input type="text" name="age" value="' . $age . '" required><br>
                            <label>Sex:</label>
                            <input type="text" name="sex" value="' . $sex . '" required><br>
                            <label>Email:</label>
                            <input type="email" name="email" value="' . $email . '" required><br>
                            <label>Address:</label>
                            <textarea name="address" required>' . $address . '</textarea><br>
                            <label>Phone:</label>
                            <input type="text" name="phone" value="' . $phone . '" required><br>
                            <input type="submit" value="Update">
                        </form>';

                    mysqli_free_result($result);
                } else {
                    echo '<p class="error">Error fetching staff information.</p>';
                    echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
                }
            } else {
                echo '<p class="error">Invalid request. Please go back to the <a href="viewstaff.php">View Staff page</a>.</p>';
            }

            mysqli_close($dbcon);
            ?>
        </div>
    </div>
</body>
</html>
