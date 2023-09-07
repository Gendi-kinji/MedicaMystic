<?php
if(isset($_POST["submit"])){
     // Grab the data submitted for updating and set it as an array
     $patient_data = [
        'patient_firstname'=> $_POST['patient_firstname'],
        'patient_surname' => $_POST['patient_surname'],
        'patient_dob'=> $_POST['patient_dob'],
        'patient_address' => $_POST['patient_address'],
        'patient_email' => $_POST['patient_email'],
        'patient_phone' => $_POST['patient_phone']
     ];

     //Restart the session to reclaim the id:
     session_start();
     $id = $_SESSION['id'];

     // Include important files:
     require_once "../inc/autoloader.inc.php";

     //Instantiate the patient class:
     $patient = new Patient();
     $patient->updatePatient($patient_data, $id);

     //Go back to  page after updating successfully:
     header("location: ../tables/editable/manage_patients.php?error=none");


}
?>