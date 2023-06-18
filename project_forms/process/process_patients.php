<?php
    require_once("../database_classes/drug_database.php");
    $patientData = [
        'patient_firstname' => $_POST['patient_firstname'],
        'patient_surname' => $_POST['patient_surname'],
        'patient_dob' => $_POST['patient_dob'],
        'patient_address' => $_POST['patient_address'],
        'patient_email' => $_POST['patient_email'],
        'patient_phone' => $_POST['patient_phone']
    ];
    $patient->addPatient($patientData);
    
?>