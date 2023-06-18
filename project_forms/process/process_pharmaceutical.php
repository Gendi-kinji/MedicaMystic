<?php
    require_once("../database_classes/drug_database.php");
    $pharmaceuticalData = [
        'company_name' => $_POST['company_name'],
        'company_address' => $_POST['company_address'],
        'company_phone' => $_POST['company_phone']
    ];
    $pharmaceutical->addPharmaceutical($pharmaceuticalData);
    
?>