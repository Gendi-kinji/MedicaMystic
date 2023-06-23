<?php
if(isset($_POST["submit"])){
     // Grab the data submitted for updating and set it as an array
     $pharmacy_data = [
        'pharmacy_name'=> $_POST['pharmacy_name'],
        'pharmacy_address' => $_POST['pharmacy_address'],
        'pharmacy_phone'=> $_POST['pharmacy_phone']
     ];

     //Restart the session to reclaim the id:
     session_start();
     $id = $_SESSION['id'];

     // Include important files:
     require "../classes/connection.class.php";
     require "../classes/databasehandler.class.php";
     require "../classes/models/pharmacy.class.php";

     //Instantiate the pharmacy class:
     $pharmacy = new Pharmacy();
     $pharmacy->updatePharmacy($pharmacy_data, $id);

     //Go back to page after updating successfully:
     header("location: ../view_tables/view_pharmacy.php?error=none");


}
?>