<?php
$hostname = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($hostname, $username, $password);
if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);
}else{
    echo "Connected successfully to MySQL";
}

?>