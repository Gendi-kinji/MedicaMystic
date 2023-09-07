<?php
    // Include important files:
    require_once "../inc/autoloader.inc.php";

    // Process supervisor form
    $form_processed = FormOperator::processSupervisorForm();
    
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