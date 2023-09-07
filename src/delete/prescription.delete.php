<?php
require_once "../inc/autoloader.inc.php";

$id = $_GET['id'];

$prescription = new prescription();
if($prescription->deletePrescription($id) === TRUE){
    header("Location: ../tables/editable/manage_prescriptions.php?error=none");
}
else{
    header("Location: ../tables/editable/manage_prescriptions.php?error=deletefailed");
};
?>