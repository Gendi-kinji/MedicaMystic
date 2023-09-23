<?php
if (isset($_POST['submit'])) {
    // Include important files:
    require_once "../inc/autoloader.inc.php";

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
        session_start();
        $_SESSION['success'] = true;
        // redirect to form page:
        header('Location: ../add/add_supervisor.php?error=none');
    } else {
        // redirect to form page:
        header('Location: ../add/add_supervisor.php?error=addfailed');
    }

} else {
    echo 'Error: No data submitted.';
}

?>