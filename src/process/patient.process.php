<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/patient.class.php";

    $patientData = [
        'patient_firstname' => $_POST['patient_firstname'],
        'patient_surname' => $_POST['patient_surname'],
        'patient_dob' => $_POST['patient_dob'],
        'patient_address' => $_POST['patient_address'],
        'patient_email' => $_POST['patient_email'],
        'patient_phone' => $_POST['patient_phone']
    ];

    $patient = new Patient();
    $patient->addPatient($patientData);

    // redirect to form page:
    header('Location: ../add/add_patient.php?error=none');
    
?>