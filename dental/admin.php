<!-- admin.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <style>
        /* Additional styles for heading and buttons */
        h1 {
            font-family: 'Lobster', cursive;
            font-weight: bold;
            font-size: 36px;
            text-align: center;
            background: linear-gradient(to right, #048FFF, #88F7F9);
            color: #ffffff;
            margin: 0;
            padding: 20px;
            opacity: 0.9; /* Adjust opacity as needed */
        }

        /* Logout button styles */
        .logout {
            box-sizing: border-box;
            border: none;
            background-color: #207db5; /* Adjust color as needed */
            color: #ffffff; /* Adjust color as needed */
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            position: absolute;
            top: 20px;
            right: 40px;
        }

        .logout:hover {
            background-color: #185c84; /* Adjust color as needed */
            text-decoration: underline;
        }

        /* Navigation button styles */
        .sublink,
        .sublinka,
        .bottoma {
            box-sizing: border-box;
            border: 1px solid #ccc;
            display: inline-block;
            width: auto;
            padding: 10px 20px;
            text-align: center;
            margin: 0 10px 10px 0;
            text-decoration: none;
            color: white;
            background-color: #2b72e8;
        }

        .sublinka:hover,
        .sublink:hover,
        .bottoma:hover {
            background-color: #4197ee;
        }

        /* Image styles */
        .img {
            position: absolute;
            margin-top: 80px;
            margin-left: 310px;
        }

        /* Right and Left container styles */
        .right,
        .left {
            position: absolute;
            margin-top: 200px;
            background-color: #2b72e8;
            padding: 40px 30px;
            text-decoration: none;
        }

        /* Additional styles for specific buttons */
        .l1,
        .l2,
        .l3,
        .l4,
        .r1,
        .r2,
        .r3,
        .r4 {
            box-sizing: border-box;
            border: 1px solid #ccc;
            display: inline-block;
            width: auto;
            padding: 10px 20px;
            text-align: center;
            margin: 0 10px 10px 0;
            text-decoration: none;
            color: white;
            background-color: #2b72e8;
        }

        .l1:hover,
        .l2:hover,
        .l3:hover,
        .l4:hover,
        .r1:hover,
        .r2:hover,
        .r3:hover,
        .r4:hover {
            background-color: #4197ee;
        }

        .sublink.r4 {
            margin-top: 5px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            position: relative;
        }

        .sublink.r4:hover {
            background-color: #4197ee;
        }
    </style>
</head>
<body>
    <h1>Dental Clinic System</h1>
    <a href="index.html" class="logout">Logout</a>
    <img src="admin.jpg" class="img">
    <div class="right">
        <a href="dentisteditadmin.php" class="sublink r1">Dentist Edit</a><br><br>
        <a href="cliniceditadmin.php" class="sublink r2">Clinic Edit</a><br><br>
        <a href="patienteditadmin.php" class="sublink r3">Patient Edit</a><br><br>
        <a href="viewstaff.php" class="sublink r4">View Staff</a>
    </div>
    <div class="left">
        <a href="dentist.php" class="sublink l1">Add Dentist</a><br><br>
        <a href="staff.php" class="sublink l2">Add Staff</a><br><br>
        <a href="clinic.php" class="sublink l3">Add Clinic information</a><br><br>
        <a href="dentalcodes.php" class="sublink l4">Add Dental Codes</a>
    </div>
    <div class="bottom">
        <a href="adminreg.php" class="bottoma">Enter Appointment Dates</a>
        <a href="adminregview.php" class="bottoma">Change Appointment Dates</a>
        <a href="confirmappoint.php" class="bottoma">Confirm Appointment</a>
        <a href="viewstaff.php" class="bottoma">View Staff</a>
    </div>
</body>
</html>
