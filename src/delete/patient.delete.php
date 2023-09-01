<?php

require "../classes/connection.class.php";
require "../classes/databasehandler.class.php";
require "../classes/models/patient.class.php";

$id = $_GET['id'];

$patient = new Patient();
if($patient->deletePatient($id) === TRUE){
    header("Location: ../tables/editable/manage_patients.php?error=none");
}
else{
    header("Location: ../tables/editable/manage_patients.php?error=deletefailed");
};
?>