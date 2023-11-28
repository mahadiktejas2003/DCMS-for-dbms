<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Staff</title>
    <link rel="stylesheet" type="text/css" href="dentisteditadmin.css">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="container">
        <div id="content">
            <h2 class="page">Staff Information</h2>

            <?php
            require('connect-mysql.php');

            // Retrieve all staff records
            $q = "SELECT * FROM staff";
            $result = @mysqli_query($dbcon, $q);

            if ($result) {
                echo '<table class="table">
                        <tr class="heading">
                            <td class="col head"><b>Name</b></td>
                            <td class="col head"><b>Age</b></td>
                            <td class="col head"><b>Sex</b></td>
                            <td class="col head"><b>Email</b></td>
                            <td class="col head"><b>Address</b></td>
                            <td class="col head"><b>Phone</b></td>
                            <td class="col head"><b>Edit</b></td>
                            <td class="last"><b>Delete</b></td>
                        </tr>';

                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    echo '<tr class="heading2">
                            <td class="col">' . $row['name'] . '</td>
                            <td class="col">' . $row['age'] . '</td>
                            <td class="col">' . $row['sex'] . '</td>
                            <td class="col">' . $row['email'] . '</td>
                            <td class="col">' . $row['address'] . '</td>
                            <td class="col">' . $row['phone'] . '</td>
                            <td class="col"><a href="edit_staffinfo.php?id=' . $row['sid'] . '">Edit</a></td>
                            <td class="last1"><a href="deletestaff.php?id=' . $row['sid'] . '">Delete</a></td>
                        </tr>';
                }

                echo '</table>';
                mysqli_free_result($result);
            } else {
                echo '<p class="error">Error fetching staff information.</p>';
                echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
            }

            mysqli_close($dbcon);
            ?>
        </div>
    </div>
</body>
</html>
