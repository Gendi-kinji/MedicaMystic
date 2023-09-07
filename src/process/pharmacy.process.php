<?php
    // Include important files:
    require_once "../inc/autoloader.inc.php";

    // Process pharmacy form
    $form_processed = FormOperator::processpharmacyForm();
    
    // redirect to form page:
    if($form_processed){
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../add/add_pharmacy.php?error=none');
    } else{
        header('Location: ../add/add_pharmacy.php?error=addfailed');
    }

?>