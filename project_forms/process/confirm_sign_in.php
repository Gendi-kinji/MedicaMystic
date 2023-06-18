<?php
    require_once("../database_classes/drug_database.php");
    $user_name = $_GET['user_name'];
    $user_pass = $_GET['user_pass'];

    $user->verifyUserDetails($user_name, $user_pass);

?>