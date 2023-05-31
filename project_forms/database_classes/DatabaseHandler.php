<?php
class DatabaseHandler{
    private $conn;
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "";

    private function establishConnection(){
        $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
        if($this->conn->connect_error){
            die("Connection error: ".$this->conn->connect_error);
        }else{
            echo "Database connected.";
        }

    }

    private function terminateConnection(){
        if($this->conn!=null){
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
            echo "Insert failed!".$this->conn->error;
            $this->terminateConnection();  
        }
    }

    public function readTable($sql){
        $this->establishConnection();
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                foreach($row as $key=>$value){
                    echo $key.": ".$value."<br>";
                }
            }
        }
    }

}

?>