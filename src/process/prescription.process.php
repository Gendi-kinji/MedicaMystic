<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/prescription.class.php";
    require "../classes/formoperator.class.php";

    // Process prescription form
    $form_processed = FormOperator::processprescriptionForm();
    
    // redirect to form page:
    if($form_processed){
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../add/add_prescription.php?error=none');
    } else{
        header('Location: ../add/add_prescription.php?error=addfailed');
    }

    // redirect to form page:
    header('Location: ../add/add_prescription.php?error=none');
    
?>