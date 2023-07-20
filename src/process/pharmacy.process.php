<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/pharmacy.class.php";
    require "../classes/formoperator.class.php";

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