<?php
class DatabaseHandler extends Connection{

    // Common methods to be inherited by sub-models:
    public function setData($table, $data) {
        $columns = array_keys($data);
        $values = array_values($data);
        $placeholders = array_fill(0, count($values), '?');
    
        // Check for the data type before assigning type:
        $types = '';
        foreach ($values as $value) {
            if (is_int($value)) {
                $types .= 'i';
            } elseif (is_double($value)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }
        }

        // Generating lists of columns and placeholders:
        $column_list = implode(',', $columns);
        $placeholder_list = implode(',', $placeholders);
    
        $sql = "INSERT INTO $table ($column_list) VALUES ($placeholder_list)";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$values);
        return $stmt->execute();
    }

    protected function getData($table, $identifier){
        $sql = "SELECT * FROM $table WHERE $identifier = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);

        $type = '';
        if (is_int($identifier)) {
            $type = 'i';
        } elseif (is_double($identifier)) {
            $type = 'd';
        } else {
            $type = 's';
        }
        $stmt->bind_param($type, $identifier);
        if(!$stmt->execute()){
            $stmt = null;
            header('Location: '.$_SERVER['PHP_SELF']);
            exit();
        }
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);

        return $data;
    }

    protected function getTable($table){
       $conn = $this->connect();
       $result = $conn->query("SELECT * FROM $table");
       $table_data = $result->fetch_all(MYSQLI_ASSOC);

       return $table_data;

    }

    /*public function deleteData($table,$data){
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
   }*/
   


}



?>