<?php
    require_once("../database_classes/drug_database.php");
    $pharmacyData = [
        'pharmacy_name' => $_POST['pharmacy_name'],
        'pharmacy_address' => $_POST['pharmacy_address'],
        'pharmacy_phone' => $_POST['pharmacy_phone']
    ];
    $pharmacy->addPharmacy($pharmacyData);
    
?>