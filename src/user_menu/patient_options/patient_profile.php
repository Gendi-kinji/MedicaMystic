<?php

require '../../classes/connection.class.php';
require '../../classes/databasehandler.class.php';
require '../../classes/models/patient.class.php';
require '../../classes/views/pageview.class.php';
require '../../classes/models/user.class.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/form_styles/universals/user_profile.css">
    <title>Patient Profile</title>
</head>
<body>
    <?php
    $user_id = "";
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        echo "<span>User Id: ".$user_id."</span><br>";
    }else{
        echo '<span style="color:red;">User id not set</span><br>';
    }
     # print_r($_SESSION);
    ?>
    <h1>Patient Profile</h1>
    <hr>
    <h3>Patient Details</h3>
    <?php
        // View the details of the specified
        $patient = new Patient();
        $patient_record = $patient->getPatientByUserId($user_id);
        PageView::displayRecord($patient_record);
    ?>
    <h3>User Account Details</h3>
    <?php
        // View the details of the specified
        $user = new User();
        $user_record = $user->getUser($user_id);
        PageView::displayRecord($user_record);
    ?>
</body>
</html>