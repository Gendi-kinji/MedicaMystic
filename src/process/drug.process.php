<?php
if (isset($_POST['submit']) && !empty($_FILES['drug_image'])) {
    // Include important files:
    require_once "../inc/autoloader.inc.php";

    // Get the form data:
    $drugData = [
        'trade_name' => $_POST['trade_name'],
        'drug_formula' => $_POST['drug_formula'],
        'drug_category' => $_POST['drug_category'],
        'administration_method' => $_POST['administration_method'],
        'dosage_mg' => $_POST['dosage_mg'],
        'drug_quantity' => $_POST['drug_quantity'],
        'drug_price' => $_POST['drug_price'],
        'expiry_date' => $_POST['expiry_date'],
    ];

    $drugFormProcessor = new DrugFormProcessor();
    $form_processed = $drugFormProcessor->processForm($drugData);

    if ($form_processed) {
        session_start();
        $_SESSION['success'] = true;
        // redirect to form page:
        header('Location: ../add/add_drug.php?error=none');
    } else {
        // redirect to form page:
        header('Location: ../add/add_drug.php?error=addfailed');
    }

} else {
    // redirect to form page:
    header('Location: ../add/add_drug.php?error=unknown');
}

?>