<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/pharmaceutical.class.php";
    require "../classes/formoperator.class.php";

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