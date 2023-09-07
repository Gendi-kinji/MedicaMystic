<?php
require_once "../inc/autoloader.inc.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $doctor = new Doctor();
    if($doctor->deleteDoctor($id) === TRUE){
        header("Location: ../tables/editable/manage_doctors.php?error=none");
    }
    else{
        header("Location: ../tables/editable/manage_doctors.php?error=deletefailed");
    };
}
?>