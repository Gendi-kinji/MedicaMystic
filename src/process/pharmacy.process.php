<?php
if (isset($_POST['submit'])) {
    // Include important files:
    require_once "../inc/autoloader.inc.php";

    // Get the form data:
    $pharmacyData = [
        'user_id' => $_POST['user_id'],
        'pharmacy_name' => $_POST['pharmacy_name'],
        'pharmacy_address' => $_POST['pharmacy_address'],
        'pharmacy_phone' => $_POST['pharmacy_phone']
    ];

    $pharmacyFormProcessor = new PharmacyFormProcessor();
    $form_processed = $pharmacyFormProcessor->processForm($pharmacyData);

    if ($form_processed) {
        session_start();
        $_SESSION['success'] = true;
        // redirect to form page:
        header('Location: ../add/add_pharmacy.php?error=none');
    } else {
        // redirect to form page:
        header('Location: ../add/add_pharmacy.php?error=addfailed');
    }

} else {
    echo 'Error: No data submitted.';
}

?>