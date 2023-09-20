<?php
if(isset($_POST)){
    // Include important files:
    require_once "../inc/autoloader.inc.php";
    
    $formoperator = new FormOperator();
    $form_processed = $formoperator->processDrugForm();
    
    if($form_processed){
        session_start();
        $_SESSION['success'] = true;
        // redirect to form page:
        header('Location: ../add/add_drug.php?error=none');
    } else{
        // redirect to form page:
        header('Location: ../add/add_drug.php?error=addfailed');
    }

} else{
    echo 'Error: No data submitted.';
}
?>