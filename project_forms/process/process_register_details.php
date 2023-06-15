<?php
    require_once("../database_classes/drug_database.php");
    $userData = ['user_name'=>$_POST['user_name'],
        'user_type'=>$_POST['user_type'],
        'user_pass'=>$_POST['user_pass']
    ];
    $user->addUser($userData);

?>