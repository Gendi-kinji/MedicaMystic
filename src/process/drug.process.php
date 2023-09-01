<?php
if(isset($_POST)){
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/drug.class.php";
    require "../classes/formoperator.class.php";

    $form_processed = FormOperator::processDrugForm();
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