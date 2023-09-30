<?php
    // Include important files:
    require_once "../../inc/autoloader.inc.php";

    // Get the form data:
        $pharmaceuticalData = [
            'user_id' => $_POST['user_id'],
            'company_name' => $_POST['company_name'],
            'company_address' => $_POST['company_address'],
            'company_phone' => $_POST['company_phone']
        ];
    
        $pharmaceuticalFormProcessor = new PharmaceuticalFormProcessor();
        $form_processed = $pharmaceuticalFormProcessor->processForm($pharmaceuticalData);

    if($form_processed){
        // return to sign in page
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../../sign_in.php?error=none');
    } else{
        // return to form
        header('Location: ../../register_details/pharmaceutical_details.php?error=failed');
    }
?>