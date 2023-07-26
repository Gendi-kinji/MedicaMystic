<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Page</title>
    <link rel="stylesheet" href="../styles/user_menu.css">
</head>
<body style="text-align:center;">
<?php
      include '../common_sections/topbar.php';
    ?><br>
    <?php
        session_start();
        if(isset($_SESSION['user_name'])){
            $user_name = $_SESSION['user_name'];
        }else{
            $user_name = 'user';
        }

        # print_r($_SESSION);
    ?>
    <header class="page-header">
         <!--Displaying the username on the page-->
        <span style="margin-left:50%; align=right;" id="welcome-username">Welcome, <?php echo $user_name; ?></span>
        <h1>Patient Menu</h1>
       
    </header>
    <hr>
    <div class="user-options">
        <a class="patient" href="patient_options/patient_profile.php">Patient details</a>
        <a class="patient" href="">Invoices</a>
        <a class="patient" href="">View Prescriptions</a>
        <a class="patient" href="">Doctor Appointments</a>
        <a class="make" href="">Make Payment</a>
    </div>
</body>
</html>