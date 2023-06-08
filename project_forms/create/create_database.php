<?php
// This php script creates the MySQL database and corresponding relations required.
require_once("../database_classes/connection.php");

$sql = "CREATE DATABASE db_drug_dispense;";
$sql .= "CREATE TABLE db_drug_dispense.tbl_patients (
    patient_ssn INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_firstname VARCHAR(30) NOT NULL,
    patient_surname VARCHAR(30) NOT NULL,
    patient_address VARCHAR(60) NOT NULL,
    patient_email VARCHAR(50) NOT NULL,
    patient_phone VARCHAR(13) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE
    CURRENT_TIMESTAMP
    );";
$sql .= "CREATE TABLE db_drug_dispense.tbl_drugs (
    drug_id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    trade_name VARCHAR(30) NOT NULL,
    drug_formula VARCHAR(30) NOT NULL,
    adminiistration_method VARCHAR(30) NOT NULL,
    drug_price FLOAT(10,2) NOT NULL,
    expiry_date DATE NOT NULL
);";



if($conn->multi_query($sql) === TRUE){
    echo "Database initialized with relations.";
} else{
    echo "An error occured: " .$conn->error;
}

?>