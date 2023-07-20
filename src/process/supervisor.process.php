<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/supervisor.class.php";
    require "../classes/formoperator.class.php";

    // Process supervisor form
    $form_processed = FormOperator::processsupervisorForm();
    
    // redirect to form page:
    if($form_processed){
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../add/add_supervisor.php?error=none');
    } else{
        header('Location: ../add/add_supervisor.php?error=addfailed');
    }

    // redirect to form page:
    header('Location: ../add/add_supervisor.php?error=none');
    
?>