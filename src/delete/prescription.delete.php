<?php
require "../classes/connection.class.php";
require "../classes/databasehandler.class.php";
require "../classes/models/prescription.class.php";

$id = $_GET['id'];

$prescription = new prescription();
if($prescription->deletePrescription($id) === TRUE){
    header("Location: ../tables/editable/manage_prescriptions.php?error=none");
}
else{
    header("Location: ../tables/editable/manage_prescriptions.php?error=deletefailed");
};
?>