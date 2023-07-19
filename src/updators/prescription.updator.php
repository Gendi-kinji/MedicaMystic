<?php
    $prescriptionData = [
        'patient_ssn' => $_POST['patient_ssn'],
        'presc_date' => $_POST['presc_date'],
    ];

    //Restart the session to reclaim the id:
    session_start();
    $id = $_SESSION['id'];

    // Include important files:
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/prescription.class.php";

    $prescription = new prescription();
    $prescription->updatePrescription($prescriptionData, $id);

    // redirect to form page:
    header('Location: ../tables/editable/manage_prescriptions.php?error=none');
    
?>