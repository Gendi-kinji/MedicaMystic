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

    protected function getData($table, $identifier, $value){
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
        $stmt->bind_param($type, $value);
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

    public function updateData($table, $data, $identifier, $unique_value) {
        $columns = array_keys($data);
        $values = array_values($data);
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
            if (is_int($unique_value)) {
                $types .= 'i';
            } elseif (is_double($unique_value)) {
                $types .= 'd';
            } else {
                $types .= 's';
            }

        // Generating lists of columns and placeholders:
        $placeholder_list = implode(',', $placeholders);

        $sql = "UPDATE $table SET $placeholder_list WHERE $identifier = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param($types, ...$values, $unique_value);
        return $stmt->execute();
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
            exit();
        }
        else{
            header('Location: '.$_SERVER['PHP_SELF']."?error=none");
        }

    }

}
?>