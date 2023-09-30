<?php
    // Include important files:
    require_once "../../inc/autoloader.inc.php";

    // Get the form data:
        $patientData = [
            'user_id' => $_POST['user_id'],
            'patient_firstname' => $_POST['patient_firstname'],
            'patient_surname' => $_POST['patient_surname'],
            'patient_dob' => $_POST['patient_dob'],
            'patient_address' => $_POST['patient_address'],
            'patient_email' => $_POST['patient_email'],
            'patient_phone' => $_POST['patient_phone']
        ];
    
        $patientFormProcessor = new PatientFormProcessor();
        $form_processed = $patientFormProcessor->processForm($patientData);

    if($form_processed){
        // return to sign in page
        session_start();
        $_SESSION['success'] = true;
        header('Location: ../../sign_in.php?error=none');
    } else{
        // return to form
        header('Location: ../../register_details/patient_details.php?error=failed');
    }
?>