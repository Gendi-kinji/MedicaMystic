<?php
    require_once("database_classes/drug_database.php");
    $drugData = [
        $trade_name => $_POST['trade_name'],
            'drug_formula' => $_POST['drug_formula'],
            'administration_method' => $_POST['administration_method'],
            'drug_price' => $_POST['drug_price'],
            'expiry_date' => $_POST['expiry_date'],
    ];
    $drug->addDrug($drugData);
    
?>