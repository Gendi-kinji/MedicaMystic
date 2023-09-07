<?php
require_once "../../inc/autoloader.inc.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/form_styles/universals/user_profile.css">
    <title>Supervisor Profile</title>
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
    <h1>Supervisor Profile</h1>
    <hr>
    <h3>Supervisor Details</h3>
    <?php
        // View the Profile of the specified
        $supervisor = new Supervisor();
        $supervisor_record = $supervisor->getSupervisorByUserId($user_id);
        PageView::displayRecord($supervisor_record);
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