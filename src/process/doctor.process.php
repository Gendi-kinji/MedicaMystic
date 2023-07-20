<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/doctor.class.php";
    require "../classes/formoperator.class.php";

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