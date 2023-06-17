<?php
    require_once("../database_classes/drug_database.php");
    $supervisorData = [
        'supervisor_firstname' => $_POST['supervisor_firstname'],
        'supervisor_lastname' => $_POST['supervisor_lastname']
    ];
    $supervisor->addSupervisor($supervisorData);
    
?>