<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/drug.class.php";

    $drugData = [
        'trade_name' => $_POST['trade_name'],
        'drug_formula' => $_POST['drug_formula'],
        'administration_method' => $_POST['administration_method'],
        'drug_price' => $_POST['drug_price'],
        'expiry_date' => $_POST['expiry_date'],
    ];

    $drug = new Drug();
    $drug->addDrug($drugData);

    // redirect to form page:
    header('Location: ../add/add_drug.php?error=none');
    
?>