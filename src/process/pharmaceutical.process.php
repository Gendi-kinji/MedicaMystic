<?php
if (isset($_POST['submit'])) {
    // Include important files:
    require_once "../inc/autoloader.inc.php";

    // Get the form data:
    $pharmaceuticalData = [
        'user_id' => $_POST['user_id'],
        'company_name' => $_POST['company_name'],
        'company_address' => $_POST['company_address'],
        'company_phone' => $_POST['company_phone']
    ];

    $pharmaceuticalFormProcessor = new PharmaceuticalFormProcessor();
    $form_processed = $pharmaceuticalFormProcessor->processForm($pharmaceuticalData);

    if ($form_processed) {
        session_start();
        $_SESSION['success'] = true;
        // redirect to form page:
        header('Location: ../add/add_pharmaceutical.php?error=none');
    } else {
        // redirect to form page:
        header('Location: ../add/add_pharmaceutical.php?error=addfailed');
    }

} else {
    echo 'Error: No data submitted.';
}

?>