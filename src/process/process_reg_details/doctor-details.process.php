<?php
// Include important files:
require_once "../../inc/autoloader.inc.php";

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
    // return to sign in page
    session_start();
    $_SESSION['success'] = true;
    header('Location: ../../sign_in.php?error=none');
} else {
    // return to form
    header('Location: ../../register_details/doctor_details.php?error=failed');
}
?>