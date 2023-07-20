<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/supervisor.class.php";

    $supervisorData = [
        'supervisor_firstname' => $_POST['supervisor_firstname'],
        'supervisor_lastname' => $_POST['supervisor_lastname'],
        'supervisor_phone'=> $_POST['supervisor_phone']
    ];

    $supervisor = new Supervisor();
    $supervisor->addSupervisor($supervisorData);

    // redirect to form page:
    header('Location: ../add/add_supervisor.php?error=none');
    
?>