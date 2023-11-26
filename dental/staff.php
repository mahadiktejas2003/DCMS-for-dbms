<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register page</title>
    <link rel="stylesheet" type="text/css" href="dentist.css">
</head>
<body>
    <div id="container">
        <div id="content">
            <?php
            require('connect-mysql.php'); // Connect to the db.

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = array();

                // Check for a name
                if (empty($_POST['name'])) {
                    $errors[] = 'You forgot to enter your name.';
                } else {
                    $name = mysqli_real_escape_string($dbcon, trim($_POST['name']));
                }

                // Check for age
                if (empty($_POST['age'])) {
                    $errors[] = 'You forgot to enter your age.';
                } else {
                    $age = mysqli_real_escape_string($dbcon, trim($_POST['age']));
                }

                // Check for sex
                if (empty($_POST['sex'])) {
                    $errors[] = 'You forgot to enter your sex.';
                } else {
                    $sex = mysqli_real_escape_string($dbcon, trim($_POST['sex']));
                }

                // Check for an address
                if (empty($_POST['address'])) {
                    $errors[] = 'You forgot to enter your address.';
                } else {
                    $address = mysqli_real_escape_string($dbcon, trim($_POST['address']));
                }

                // Check for phone no.
                if (empty($_POST['phone'])) {
                    $errors[] = 'You forgot to enter your phone no.';
                } else {
                    $phone = mysqli_real_escape_string($dbcon, trim($_POST['phone']));
                }

                // Check for an email address
                if (empty($_POST['email'])) {
                    $errors[] = 'You forgot to enter your email address.';
                } else {
                    $email = mysqli_real_escape_string($dbcon, trim($_POST['email']));
                }

                if (empty($errors)) {
                    $q = "INSERT INTO staff (name, sex, age, phone, address, email, registration_date)
                    VALUES ('$name', '$sex', '$age', '$phone', '$address', '$email', NOW())";
                    $result = @mysqli_query($dbcon, $q);

                    if ($result) {
                        header("location: admin.php");
                        exit();
                    } else {
                        echo '<h2 class="error">System Error</h2>
                        <p class="error">You could not be registered due to a system error. We apologize 
                        for any inconvenience.</p>';
                        echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
                    }
                    mysqli_close($dbcon);
                    exit();
                } else {
                    echo '<h2 class="error">Error!</h2>
                        <p class="error">The following error(s) occurred:<br>';
                    foreach ($errors as $msg) {
                        echo " - $msg<br>\n";
                    }
                    echo '</p><h3 class="error">Please try again.</h3><p><br></p>';
                }
            }
            ?>

            <h2 class="title">Insert Staff Information</h2>
            <form action="staff.php" method="post" class="form">
                <p><label class="label" for="name">Name:</label> 
                <input type="text" name="name" size="30" maxlength="30" 
                value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>"></p>

                <p><label class="label" for="sex">Sex:</label>
                <input type="text" name="sex" size="30" maxlength="60" 
                value="<?php if (isset($_POST['sex'])) echo htmlspecialchars($_POST['sex']); ?>" ></p>

                <p><label class="label" for="age">Age:</label>
                <input type="number" name="age" size="30" maxlength="60" 
                value="<?php if (isset($_POST['age'])) echo htmlspecialchars($_POST['age']); ?>" ></p>

                <p><label class="label" for="phone">Phone No:</label>
                <input type="tel" pattern="[789][0-9]{9}" name="phone" size="30" maxlength="60" 
                value="<?php if (isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']); ?>" ></p>

                <p><label class="label" for="address">Address:</label>
                <input type="text" name="address" size="30" maxlength="60" 
                value="<?php if (isset($_POST['address'])) echo htmlspecialchars($_POST['address']); ?>" ></p>

                <p><label class="label" for="email">Email:</label>
                <input id="email" type="text" name="email" size="30" maxlength="60" 
                value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>" ></p>

                <p><input id="submit" type="submit" name="submit" value="Register"></p>
            </form>
        </div>
    </div>
</body>
</html>
