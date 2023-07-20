<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/supervisor.class.php";
    require "../../classes/formoperator.class.php";

    // Process supervisor form
    $form_processed = FormOperator::processsupervisorForm();

    if($form_processed){
        // return to sign in page
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../../sign_in.php?error=none');
    } else{
        // return to form
        header('Location: ../../register_details/supervisor_details.php?error=failed');
    }
?>