<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "db_drug_dispense";

$conn = new mysqli($hostname, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}else{
    echo "Connected successfully to ".$dbname;
}

?>