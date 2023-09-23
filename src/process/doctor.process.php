<?php
if (isset($_POST['submit'])) {
    // Include important files:
    require_once "../inc/autoloader.inc.php";

    // Get the form data:
    $doctorData = [
        'user_id' => $_POST['user_id'],
        'doctor_firstname' => $_POST['doctor_firstname'],
        'doctor_surname' => $_POST['doctor_surname'],
        'doctor_dob' => $_POST['doctor_dob'],
        'doctor_address' => $_POST['doctor_address'],
        'doctor_email' => $_POST['doctor_email'],
        'years_of_exp' => $_POST['years_of_exp'],
        'doctor_phone' => $_POST['doctor_phone']
    ];

    $doctorFormProcessor = new DoctorFormProcessor();
    $form_processed = $doctorFormProcessor->processForm($doctorData);

    if ($form_processed) {
        session_start();
        $_SESSION['success'] = true;
        // redirect to form page:
        header('Location: ../add/add_doctor.php?error=none');
    } else {
        // redirect to form page:
        header('Location: ../add/add_doctor.php?error=addfailed');
    }

} else {
    echo 'Error: No data submitted.';
}

?>