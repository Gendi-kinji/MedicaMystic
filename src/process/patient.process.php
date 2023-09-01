<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/patient.class.php";
    require "../classes/formoperator.class.php";

    // Process patient form
    $form_processed = FormOperator::processpatientForm();
    
    // redirect to form page:
    if($form_processed){
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../add/add_patient.php?error=none');
    } else{
        header('Location: ../add/add_patient.php?error=addfailed');
    }
    
?>