<?php
class DataView{
    // This function renders the column data on a dropdown list:
    public static function fillDropdown($column_data){
        $column_name = array_key_first($column_data[0]);

        echo "<select name=$column_name>";
        foreach($column_data as $row){
            foreach($row as $column){
                echo '<option value="'.htmlspecialchars($column).'">'.htmlspecialchars($column).'</option>';
            }
        }
        echo "</select>";
    }
}
?>