<?php
// Include important files:
require_once "../../inc/autoloader.inc.php";

// Get the form data:
$supervisorData = [
    'user_id' => $_POST['user_id'],
    'supervisor_firstname' => $_POST['supervisor_firstname'],
    'supervisor_lastname' => $_POST['supervisor_lastname'],
    'supervisor_phone' => $_POST['supervisor_phone'],
    'pharmacy_id' => $_POST['pharmacy_id']
];

$supervisorFormProcessor = new SupervisorFormProcessor();
$form_processed = $supervisorFormProcessor->processForm($supervisorData);

if ($form_processed) {
    // return to sign in page
    session_start();
    $_SESSION['success'] = true;
    header('Location: ../../sign_in.php?error=none');
} else {
    // return to form
    header('Location: ../../register_details/supervisor_details.php?error=failed');
}
?>