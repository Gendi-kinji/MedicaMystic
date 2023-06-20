<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/pharmaceutical.class.php";
    $pharmaceuticalData = [
        'company_name' => $_POST['company_name'],
        'company_address' => $_POST['company_address'],
        'company_phone' => $_POST['company_phone']
    ];

    $pharmaceutical = new Pharmaceutical();
    $pharmaceutical->addPharmaceutical($pharmaceuticalData);

    // redirect to form page:
    header('Location: ../add/add_pharmaceutical.php?error=none');
    
?>