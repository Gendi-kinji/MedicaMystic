<?php
class TableView{
    public static function showTable($table_data, $item_name){
        if(count($table_data)>0){
            echo "<table>";
            $keys = array_keys($table_data[0]); // get the columns of the table from the first array
            $id=$keys[0];
            echo "<tr>";
            foreach($keys as $key){
                echo "<th scope='col'>".$key."</th>"; // display the attributes as headers for the table
            }
            echo "<th colspan=2>Action</th>";
            echo "</tr>";
            foreach($table_data as $row){ // loop through each row of the table (the 2d array)
                echo "<tr>";
                foreach($row as $value){
                    echo "<td>".$value."</td>"; // display the records (values) in the HTML table
                }
                $identifier = $row[$id];
                echo "<td><a class='btn-links btn-update' href='../update/update_$item_name.php?id=$identifier'>Update</a></td>";
                echo "<td><a class='btn-links btn-delete' href='../delete/$item_name.delete.php?id=$identifier'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        echo "<br>";
        echo "<a class='btn-links btn-new' href='../add/add_$item_name.php'>Add New Record</a>";
    }
}?>