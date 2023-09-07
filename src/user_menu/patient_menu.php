<?php
require_once "../inc/autoloader.inc.php";
?>


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
        if(isset($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];

            //Grabbing the patientSSN
            $patient = new Patient();
            $patient_data = $patient->getPatientByUserId($user_id);
            $patient_ssn = $patient_data[0]['patient_ssn'];

            $_SESSION['patient_ssn'] = $patient_ssn;
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
        <a class="patient" href="patient_options/patient_invoices.php">Invoices</a>
        <a class="patient" href="patient_options/patient_prescriptions.php">View Prescriptions</a>
        <!--<a class="patient" href="">Doctor Appointments</a>-->
        <!--<a class="make" href="">Make Payment</a>-->
    </div>
</body>
</html>