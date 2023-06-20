<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/pharmacy.class.php";

    $pharmacyData = [
        'pharmacy_name' => $_POST['pharmacy_name'],
        'pharmacy_address' => $_POST['pharmacy_address'],
        'pharmacy_phone' => $_POST['pharmacy_phone']
    ];

    $pharmacy = new Pharmacy();
    $pharmacy->addPharmacy($pharmacyData);

    // redirect to form page:
    header('Location: ../add/add_pharmacy.php?error=none');
    
?>