<?php
class DatabaseHandler{
    private $conn;
    private $hostname = "localhost";
    private $username = "root";
    private  $password = "";

    private function establishConnection(){
        $this->conn = new mysqli($this->hostname, $this->username, $this->password);
        if($this->conn->connect_error){
            die("Connection error: ".$this->conn->connect_error);
        }else{
            echo "Database connected.";
        }

    }

    private function terminateConnection(){
        if($this->conn!==null){
            $this->conn->close();
            echo "Connection closed";
        }else{
            echo "Failed to close connection.";
        }
    }

    public function insertData($sql){
        $this->establishConnection();
        if($this->conn->query($sql)===TRUE){
            echo "Insert success!"; 
            $this->terminateConnection();          
        }else{
            echo "Insert failed!".$this->conn->error();
            $this->terminateConnection();  
        }
    }

    public function readTable($sql){
        $this->establishConnection();
        if($this->conn->query)
    }

}

$trade_name = 'Panadol Xtra';
$drug_formula = 'Bisomethingsomething';
$administration_method = 'Via the eyes';
$drug_price = 99999.99;
$expiry_date = '2025-04-25';

$db=new DatabaseHandler();
$sql = "INSERT INTO db_drug_dispense.tbl_drugs (trade_name, drug_formula, administration_method, drug_price, expiry_date) 
VALUES('$trade_name' , '$drug_formula', '$administration_method', $drug_price, '$expiry_date');";
$db->insertData($sql);

?>