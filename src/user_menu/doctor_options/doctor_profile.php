<?php

require '../../classes/connection.class.php';
require '../../classes/databasehandler.class.php';
require '../../classes/models/doctor.class.php';
require '../../classes/views/pageview.class.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/form_styles/universals/user_profile.css">
    <title>Doctor Profile</title>
</head>
<body>
    <?php
    $user_id = "";
    session_start();
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
        echo "<span>User Id: ".$user_id."</span>";
    }else{
        echo '<span style="color:red;">User id not set</span>';
    }
    ?>
    <h1>Doctor Profile</h1>
    <hr>
    <h3>Doctor Details</h3>
    <?php
        // View the Profile of the specified
        $doctor = new Doctor();
        $doctor_record = $doctor->getDoctorByUserId($user_id);
        PageView::displayRecord($doctor_record);
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