<?php

require "../classes/connection.class.php";
require "../classes/databasehandler.class.php";
require "../classes/models/doctor.class.php";

$id = $_GET['id'];

$doctor = new Doctor();
if($doctor->deleteDoctor($id) === TRUE){
    header("Location: ../view_tables/view_doctors.php?error=none");
}
else{
    header("Location: ../view_tables/view_doctors.php?error=deletefailed");
};
?>