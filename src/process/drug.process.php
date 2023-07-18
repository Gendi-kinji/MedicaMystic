<?php
if(isset($_POST)){
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/drug.class.php";

    $drugData = [
        'trade_name' => $_POST['trade_name'],
        'drug_formula' => $_POST['drug_formula'],
        'administration_method' => $_POST['administration_method'],
        'dosage_mg'=> $_POST['dosage_mg'],
        'drug_quantity'=> $_POST['drug_quantity'],
        'drug_price' => $_POST['drug_price'],
        'expiry_date' => $_POST['expiry_date'],
    ];

    $drug = new Drug();
    $drug->addDrug($drugData);

    // redirect to form page:
    header('Location: ../add/add_drug.php?error=none');
} else{
    echo 'Error: No data submitted.';
}
?>