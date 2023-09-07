<?php
    // Include important files:
    require_once "../inc/autoloader.inc.php";
    // Process doctor form
    $form_processed = FormOperator::processDoctorForm();
    
    // redirect to form page:
    if($form_processed){
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../add/add_doctor.php?error=none');
    } else{
        header('Location: ../add/add_doctor.php?error=addfailed');
    }
?>