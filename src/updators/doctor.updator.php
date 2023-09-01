<?php
if(isset($_POST["submit"])){
     // Grab the data submitted for updating and set it as an array
     $doctor_data = [
        'doctor_firstname'=> $_POST['doctor_firstname'],
        'doctor_surname' => $_POST['doctor_surname'],
        'doctor_dob'=> $_POST['doctor_dob'],
        'doctor_address' => $_POST['doctor_address'],
        'doctor_email' => $_POST['doctor_email'],
        'years_of_exp' => $_POST['years_of_exp'],
        'doctor_phone' => $_POST['doctor_phone']
     ];

     //Restart the session to reclaim the id:
     session_start();
     $id = $_SESSION['id'];

     // Include important files:
     require "../classes/connection.class.php";
     require "../classes/databasehandler.class.php";
     require "../classes/models/doctor.class.php";

     //Instantiate the doctor class:
     $doctor = new Doctor();
     $doctor->updateDoctor($doctor_data, $id);

     //Go back to  page after updating successfully:
     header("location: ../tables/editable/manage_doctors.php?error=none");


}
?>