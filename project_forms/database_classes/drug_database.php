<?php
class DatabaseHandler{
    public  $conn;
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
            }
        }
    }

    protected function getConnection(){
        if($this->conn != null){
            return $this->conn;
        }
        else{
            echo "No database connection found.";
            return null;
        }
    }
    public function terminateConnection(){
        if($this->conn!=null){
            $this->conn->close();
            echo "Database connection closed.<br>";
        }else{
            echo "Failed to close database connection.<br>";
        }
    }

    // Obtain the keys and attributes from the array
    protected function extractDetails($array){
        // Printing the value of the array:
        foreach($array as $key=>$value){
            echo $key.": ".$value."<br>";
        }
        // Joining array elements with a string using implode()
        $columns = implode(", ", array_keys($array));
        $values = implode("', '", array_values($array));
        return array($columns, $values);
    }


    public function insertData($table, $data){
        $this->establishConnection();
        list($columns, $values) = self::extractDetails($data); // extracting the details from the array
        if($this->conn->query("INSERT INTO $table ($columns) VALUES ('$values')")===TRUE){
            echo "Insert success!<br>"; 
            $this->terminateConnection(); 
            return 1;         
        }else{
            echo "Insert failed: ".$this->conn->error."<br>";
            $this->terminateConnection();
            return 0;  
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
    public function deleteData($table,$data){
        $this->establishConnection();
        list($columns,$values)=self::extractDetails($data);
        if($this->conn->query("DELETE FROM $table($columns) VALUES ('$values')")===TRUE){
            echo "Data deleted from table";
        }
        else{
            echo "Deletion failed";
        }
        
        
       
}
   public function updateData($table,$data){
    $this->establishConnection();
    list($columns,$values)=self::extractDetails($data);
    if($this->conn->query("UPDATE $table SET $columns='$values'")){
        echo "Data updated to table";

    }
    else{
        echo "Update failed";
    }
   }
}

class Patient extends DatabaseHandler{
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

class Supervisor extends DatabaseHandler{
    public function __construct(){

    }

    public function addSupervisor($supervisorData){
        parent::insertData('tbl_supervisors', $supervisorData);
    }
}

class User extends DatabaseHandler{
    public function __construct(){

    }

    public function registerUser($userData){
        echo "<script>
        alert('Registering user...');
        </script>";
       if(parent::insertData('tbl_users', $userData)){
        echo "You have been registered successfully. Return to Sign In Page to sign in.";
       }else{
        echo "An error when submitting details. Please try again.";
       }
    }

    // Open the user page depending on user type.
    private function openUserMenu($user_type){
        $redirect_page = "";
        // switch-case block that sets the redirect page depending on the user type:
        switch ($user_type) {
            case "pharmacist":
                $redirect_page = "../user_menu/pharmacy_menu.php";
                break;
            case "patient":
                $redirect_page = "../user_menu/patient_menu.php";
                break;
            case "doctor":
                $redirect_page = "../user_menu/doctor_menu.php";
                break;
            case "supervisor":
                $redirect_page = "../user_menu/supervisor_menu.php";
                break;
            case "pharmaceutical_company":
                $redirect_page = "../user_menu/pharmaceutical_company_menu.php";
        }
        echo "<script>
        alert('Details verified successfully');
        window.location.href='$redirect_page';
        </script>";
    }
    public function verifyUserDetails($user_name, $user_pass){
        parent::establishConnection();
        $conn = parent::getConnection();
        $statement = $conn->prepare("SELECT * FROM tbl_users WHERE user_name=? AND user_pass=?");
        $statement->bind_param("ss", $user_name, $user_pass);

        if($statement->execute() === TRUE){
            $result = $statement->get_result();
            if ($result->num_rows>0){

                // Start a session and store the user_name in a session variable:
                session_start();
                $_SESSION['user_name'] = $user_name;

                // Get the user type from the result
                $row = $result->fetch_assoc();
                $user_type = $row['user_type'];

                // Check user type first then switch to relevant user page:
                self::openUserMenu($user_type);
                
                parent::terminateConnection();
            }else{
                echo "<script>
                alert('Invalid username or password');
                window.location.href='../sign_in.php';
                </script>";
                parent::terminateConnection();
            }    
        }else{
            echo "Error validating user details: ".$conn->error;
            
            parent::terminateConnection();
        }

    }
}

// creating objects from the classes:

$db = DatabaseHandler::getInstance(); // DatabaseHandler

// Database Tables:
$patient = new Patient(); // patient object
$drug = new Drug(); // drug object
$doctor = new Doctor(); // doctor object
$pharmacy = new Pharmacy(); // pharmacy object
$pharmaceutical = new Pharmaceutical(); // pharmaceutical object
$supervisor = new Supervisor(); // supervisor object
$user = new User(); // user object
?>