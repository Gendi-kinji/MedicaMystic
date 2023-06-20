<?php

class Connection{
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "db_drug_dispense";

    protected function connect(){
        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if($conn->connect_error){
            die("Connection error: ".$conn->connect_error)."<br>";
        }
            return $conn;
        }
        
}    

?>