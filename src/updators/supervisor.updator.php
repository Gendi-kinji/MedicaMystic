<?php
if(isset($_POST["submit"])){
     // Grab the data submitted for updating and set it as an array
     $supervisor_data = [
        'supervisor_firstname'=> $_POST['supervisor_firstname'],
        'supervisor_lastname' => $_POST['supervisor_lastname'],
        'supervisor_phone' => $_POST['supervisor_phone'],
        'pharmacy_id' => $_POST['pharmacy_id']
     ];

     //Restart the session to reclaim the id:
     session_start();
     $id = $_SESSION['id'];

     // Include important files:
     require_once "../inc/autoloader.inc.php";

     //Instantiate the supervisor class:
     $supervisor = new Supervisor();
     $supervisor->updateSupervisor($supervisor_data, $id);

    //Go back to  page after updating successfully:
    header("location: ../tables/editable/manage_supervisors.php?error=none");


}
?>