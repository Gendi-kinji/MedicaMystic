<?php
class DatabaseHandler extends Connection{

    public function setData($table, $data, $return_insert_id = false) {
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
        if ($stmt->execute()) {
            if ($return_insert_id) {
                return $conn->insert_id;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    protected function getData($table, $identifier, $search_value){
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
        $stmt->bind_param($type, $search_value);
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

    protected function getColumn($column, $table){
        $conn = $this->connect();
        $sql = "SELECT $column FROM $table";
        $result = $conn->query($sql);
        $column_data = $result->fetch_all(MYSQLI_ASSOC);

        return $column_data;
    }

    public function updateData($table, $identifier, $data, $unique_value) {
        $columns = array_keys($data);
        $values = array_values($data);
        array_push($values, $unique_value);
        $placeholders = array_map(function ($column) {
            return "$column=?";
        }, $columns);

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
        $placeholder_list = implode(',', $placeholders);
      
        $sql = "UPDATE $table SET $placeholder_list WHERE $identifier = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$values);

        $result = null;
        if(!$stmt->execute()){
            $stmt = null;
            header('Location: '.$_SERVER['PHP_SELF']."?error=stmtfailed");
            exit();
        }
        else{
            $result = $stmt->execute();
        }
        return $result;
    }

    public function deleteData($table, $identifier, $value){
        $sql = "DELETE FROM $table WHERE $identifier = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $type = '';
        if (is_int($value)) {
            $type = 'i';
        } elseif (is_double($value)) {
            $type = 'd';
        } else {
            $type = 's';
        }
        $stmt->bind_param($type, $value);
        if(!$stmt->execute()){
            $stmt = null;
            header('Location: '.$_SERVER['PHP_SELF']);
            return false;
        }else{
            return true;
        }

    }

}
?>