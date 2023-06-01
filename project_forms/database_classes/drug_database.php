<?php
class DatabaseHandler{
    private $conn;
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "db_drug_dispense";
    private static $instance = null;

    private function __construct(){
        // Private constructor
        self::establishConnection();
    }

    public static function getInstance(){
        if (self::$instance == null){
            self::$instance = new DatabaseHandler();
        }
        return self::$instance;
    }

    public function establishConnection(){
        if($this->conn == null){
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
            if($this->conn->connect_error){
                die("Connection error: ".$this->conn->connect_error)."<br>";
            }else{
                echo "Connected to ".$this->dbname."<br>";
            }
        }
    }
    private function terminateConnection(){
        if($this->conn!=null){
            $this->conn->close();
            echo "Connection closed.<br>";
        }else{
            echo "Failed to close connection.<br>";
        }
    }

    public function insertData($sql){
        $this->establishConnection();
        if($this->conn->query($sql)===TRUE){
            echo "Insert success!<br>"; 
            $this->terminateConnection();          
        }else{
            echo "Insert failed!".$this->conn->error."<br>";
            $this->terminateConnection();  
        }
    }

    public function readTable($sql){
        $this->establishConnection();
        $result = $this->conn->query($sql);
        if($result->num_rows > 0){
            echo "<table>";
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                foreach($row as $key=>$value){
                    echo "<td>".$key."</td><td>".$value."</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else{
            echo "No records found.<br>";
        }
        $this->terminateConnection();
    }
}

class Patient extends DatabaseHandler{
    private $patient_ssn;
    private $patient_firstname;
    private $patient_surname;
    private $patient_dob;
    private $patient_address;
    private $patient_email;
    private $patient_phone;
    private $reg_date;

    public function __construct(){

    }

    public function addPatient($patientData) {
        $columns = implode(", ", array_keys($patientData));
        $values = implode("', '", array_values($patientData));
        $sql = "INSERT INTO tbl_patients ($columns) VALUES ('$values')";
        parent::insertData($sql);
    }

}

class Doctor extends DatabaseHandler{
    
}

class Drug extends DatabaseHandler{

}

class Pharmacy extends DatabaseHandler{

}

class Pharmaceutical extends DatabaseHandler{

}

// creating objects from the classes:

$db = DatabaseHandler::getInstance();
$patient = new Patient();
?>