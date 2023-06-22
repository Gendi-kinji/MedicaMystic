<?php
class TableView{
    public static function showTable($table_data){
        if(count($table_data)>0){
            echo "<table>";
            $keys = array_keys($table_data[0]); // get the columns of the table from the first array
            $id=$keys[0];
            echo "<tr>";
            foreach($keys as $key){
                echo "<th scope='col'>".$key."</th>"; // display the attributes as headers for the table
            }
            echo "<th colspan='2'>Action</th>";
            echo "</tr>";
            foreach($table_data as $row){ // loop through each row of the table (the 2d array)
                echo "<tr>";
                foreach($row as $value){
                    echo "<td>".$value."</td>"; // display the records (values) in the HTML table
                }
                echo "<td><a href='update.php?id=$row[$id]'>Update</a></td>";
                echo "<td><a href='delete.php?id=$row[$id]'>Delete</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    }
}?>