<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/pharmacy.class.php";
    require "../../classes/formoperator.class.php";

    // Process pharmacy form
    $form_processed = FormOperator::processpharmacyForm();

    if($form_processed){
        // return to sign in page
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../../sign_in.php?error=none');
    } else{
        // return to form
        header('Location: ../../register_details/pharmacy_details.php?error=failed');
    }
?>