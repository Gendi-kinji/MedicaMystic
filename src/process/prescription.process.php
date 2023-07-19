<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/prescription.class.php";

    $prescriptionData = [
        'patient_ssn' => $_POST['patient_ssn'],
        'presc_date' => $_POST['presc_date'],
    ];

    $prescription = new prescription();
    $prescription->addprescription($prescriptionData);

    // redirect to form page:
    header('Location: ../add/add_prescription.php?error=none');
    
?>