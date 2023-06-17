<?php
require_once("../database_classes/drug_database.php");
    $doctorData = [
        'doctor_firstname' => $_POST['doctor_firstname'],
        'doctor_surname' => $_POST['doctor_surname'],
        'doctor_dob' => $_POST['doctor_dob'],
        'doctor_address' => $_POST['doctor_address'],
        'doctor_email' => $_POST['doctor_email'],
        'years_of_exp' => $_POST['years_of_exp'],
        'doctor_phone' => $_POST['doctor_phone']
    ];
    $doctor->addDoctor($doctorData);
?>