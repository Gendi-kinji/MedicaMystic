<?php
    // Include important files:
    require_once "../inc/autoloader.inc.php";

    // Process pharmaceutical form
    $form_processed = FormOperator::processpharmaceuticalForm();
    
    // redirect to form page:
    if($form_processed){
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../add/add_pharmaceutical.php?error=none');
    } else{
        header('Location: ../add/add_pharmaceutical.php?error=addfailed');
    }
    
?>