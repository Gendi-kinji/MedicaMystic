<?php
if(isset($_POST["submit"])){
     // Grab the data submitted for updating and set it as an array
     $pharmaceutical_data = [
        'company_name'=> $_POST['company_name'],
        'company_address' => $_POST['company_address'],
        'company_phone'=> $_POST['company_phone']
     ];

     //Restart the session to reclaim the id:
     session_start();
     $id = $_SESSION['id'];

     // Include important files:
     require "../classes/connection.class.php";
     require "../classes/databasehandler.class.php";
     require "../classes/models/pharmaceutical.class.php";

     //Instantiate the pharmaceutical class:
     $pharmaceutical = new Pharmaceutical();
     $pharmaceutical->updatePharmaceutical($pharmaceutical_data, $id);

     //Go back to  page after registering successfully:
     header("location: ../view_tables/view_pharmaceutical.php?error=none");


}
?>