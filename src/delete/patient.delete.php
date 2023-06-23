<?php
$id = $_GET['id'];

$patient = new patient();
if($patient->deletepatient($id) === TRUE){
    header("Location: ..view_tables/view_patients.php?error=none");
}
else{
    header("Location: ..view_tables/view_patients.php?error=deletefailed");
};
?>