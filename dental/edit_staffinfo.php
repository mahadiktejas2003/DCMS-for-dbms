<!doctype html>
<html lang="en">
<head>
    <title>Edit Staff Member</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="dentist.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #container {
            width: 50%;
            margin: 3cm 0 0 5cm; /* 3cm from the top, 5cm from the left */
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #content {
            text-align: left;
        }

        h2 {
            color: #333;
        }

        form {
            width: 100%;
            max-width: 400px;
            margin: 20px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="content"><!-- Start of the edit page content -->
            <h2>Edit Staff Member</h2>

            <?php
                // After clicking the Edit link in the viewstaff.php page, the editing interface appears
                // The code looks for a valid staff ID, either through GET or POST
                if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) {
                    $id = $_GET['id'];
                } elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) {
                    $id = $_POST['id'];
                } else { // If no valid ID, stop the script
                    echo '<p class="error">This page has been accessed in error</p>';
                    exit();
                }

                require('connect-mysql.php');

                // Has the form been submitted?
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $errors = array();

                    // Look for the staff member details
                    if (empty($_POST['name'])) {
                        $errors[] = 'You forgot to enter the name';
                    } else {
                        $name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
                    }

                    // Look for the age
                    if (empty($_POST['age'])) {
                        $errors[] = 'You forgot to enter the age.';
                    } else {
                        $age = mysqli_real_escape_string($dbcon, trim($_POST['age']));
                    }

                    // Look for the phone number
                    if (empty($_POST['phone'])) {
                        $errors[] = 'You forgot to enter the phone no.';
                    } else {
                        $phone = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
                    }

                    // Look for the email
                    if (empty($_POST['email'])) {
                        $errors[] = 'You forgot to enter the email id.';
                    } else {
                        $email = mysqli_real_escape_string($dbcon, trim($_POST['email']));
                    }

                    // Look for the address
                    if (empty($_POST['address'])) {
                        $errors[] = 'You forgot to enter the address.';
                    } else {
                        $address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
                    }

                    if (empty($errors)) { // If everything is OK, make the update query
                        $q = "UPDATE staff SET name='$name', age='$age', phone='$phone', email='$email', address='$address' WHERE sid=$id LIMIT 1";
                        $result = @mysqli_query($dbcon, $q);
                        if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
                            echo '<h3>The staff member has been edited.</h3>';
                        } else { // If the query failed
                            echo '<p class="error">The staff member could not be edited due to a system error. We apologize for any inconvenience.</p>';
                            echo '<p>' . mysqli_error($dbcon) . '<br />Query: ' . $q . '</p>';
                        }
                        mysqli_close($dbcon);
                        exit();
                    } else { // Display the errors.
                        echo '<p class="error">The following error(s) occurred:<br />';
                        foreach ($errors as $msg) {
                            echo " - $msg<br>\n";
                        }
                        echo '</p><p>Please try again.</p>';
                    }
                } // End of the conditionals
            ?>

            <?php
                // Select the record
                $q = "SELECT sid, name, age, phone, email, address FROM staff WHERE sid=$id";
                $result = @mysqli_query($dbcon, $q);
                if (mysqli_num_rows($result) == 1) { // Valid staff ID, display the form.
                    // Get the staff member's information
                    $row = mysqli_fetch_array($result, MYSQLI_NUM);
                    // Create the form
                    echo '<form action="edit_staffinfo.php" method="post">
                            <label for="name">Name:</label>
                            <input type="text" name="name" value="' . $row[1] . '">
                            
                            <label for="age">Age:</label>
                            <input type="text" name="age" value="' . $row[2] . '">
                            
                            <label for="phone">Phone:</label>
                            <input type="text" name="phone" value="' . $row[3] . '">
                            
                            <label for="email">Email:</label>
                            <input type="text" name="email" value="' . $row[4] . '">
                            
                            <label for="address">Address:</label>
                            <input type="text" name="address" value="' . $row[5] . '">
                            
                            <input type="submit" name="submit" value="Edit">
                            <input type="hidden" name="id" value="' . $id . '" />
                        </form>';
                } else { // The record could not be validated
                    echo '<p class="error">This page has been accessed in error</p>';
                }
                mysqli_close($dbcon);
            ?>
        </div><!-- End of the edit page content -->
    </div>
</body>
</html>
