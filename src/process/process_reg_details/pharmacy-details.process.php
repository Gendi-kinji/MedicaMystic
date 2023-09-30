<?php
    // Include important files:
    require_once "../../inc/autoloader.inc.php";

    // Get the form data:
        $pharmacyData = [
            'user_id' => $_POST['user_id'],
            'pharmacy_name' => $_POST['pharmacy_name'],
            'pharmacy_address' => $_POST['pharmacy_address'],
            'pharmacy_phone' => $_POST['pharmacy_phone']
        ];
    
        $pharmacyFormProcessor = new PharmacyFormProcessor();
        $form_processed = $pharmacyFormProcessor->processForm($pharmacyData);

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