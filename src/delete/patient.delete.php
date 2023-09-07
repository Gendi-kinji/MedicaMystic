<?php
require_once "../inc/autoloader.inc.php";

$id = $_GET['id'];

$patient = new Patient();
if($patient->deletePatient($id) === TRUE){
    header("Location: ../tables/editable/manage_patients.php?error=none");
}
else{
    header("Location: ../tables/editable/manage_patients.php?error=deletefailed");
};
?>