<?php
    // Include important files:
    require_once "../../inc/autoloader.inc.php";

    // Process patient form
    $form_processed = FormOperator::processpatientForm();

    if($form_processed){
        // return to sign in page
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../../sign_in.php?error=none');
    } else{
        // return to form
        header('Location: ../../register_details/patient_details.php?error=failed');
    }
?>