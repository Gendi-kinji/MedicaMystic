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

    // Obtain the keys and attributes from the array
    protected function extractDetails($array){
        // Joining array elements with a string using implode()
        $columns = implode(", ", array_keys($array));
        $values = implode("', '", array_values($array));
        return array($columns, $values);
    }


    public function insertData($table, $data){
        $this->establishConnection();
        list($columns, $values) = self::extractDetails($data);
        if($this->conn->query("INSERT INTO $table ($columns) VALUES ('$values')")===TRUE){
            echo "Insert success!<br>"; 
            $this->terminateConnection();          
        }else{
            echo "Insert failed!".$this->conn->error."<br>";
            $this->terminateConnection();  
        }
    }

    public function readTable($sql){
        $this->establishConnection();
        $result = $this->conn->query($sql); // fetch the result set (entire table) of the MySQL query
        if($result->num_rows > 0){
            echo "<table>";
            $keys = $result->fetch_fields(); // fetch the attributes of the MySQL table
            echo "<tr>";
            for($i=0; $i<sizeof($keys); $i++){
                echo "<th scope='col'>".$keys[$i]->name."</th>"; // display the attributes as headers for the table
            }
            echo "</tr>";
            while($row = $result->fetch_assoc()){ // fetch the records of the database as associative arrays
                echo "<tr>";
                foreach($row as $value){
                    echo "<td>".$value."</td>"; // display the records (values) in the HTML table
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "<script>alert('Table retrieved successfully')</script>";
        } else{
            echo "No records found.<br>"; // returns 'No records found' if there are no rows in the MySQL database
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
        parent::insertData('tbl_patients', $patientData);
    }

}

class Doctor extends DatabaseHandler{

    public function __construct(){

    }

    public function addDoctor($doctorData){
        parent::insertData('tbl_doctors', $doctorData);;
    }

}

class Drug extends DatabaseHandler{

    public function __construct(){
        
    }

    public function addDrug($drugData){

        parent::insertData('tbl_drugs', $drugData);
    }

}

class Pharmacy extends DatabaseHandler{
    public function __construct(){

    }

    public function addPharmacy($pharmacyData){
        parent::insertData('tbl_pharmacy', $pharmacyData);
    }

}

class Pharmaceutical extends DatabaseHandler{
    public function __construct(){

    }

    public function addPharmaceutical($pharmaceuticalData){
        parent::insertData('tbl_pharmaceutical', $pharmaceuticalData);
    }
}

// creating objects from the classes:

$db = DatabaseHandler::getInstance(); // DatabaseHandler
$patient = new Patient(); // patient object
$drug = new Drug(); // drug object
?>