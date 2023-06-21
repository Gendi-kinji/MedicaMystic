<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/supervisor.class.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Supervisor Details</title>
        <link rel="stylesheet" href="../styles/table_styles.css">
    </head>
    <body>
        <h1>Supervisors Table</h1>
        <center>
            <?php
            $supervisor = new Supervisor();
            $supervisor_table = $supervisor->getAllSupervisors();
            if(count($supervisor_table)>0){
                echo "<table>";
                $keys = array_keys($supervisor_table[0]); // get the columns of the table from the first array
                echo "<tr>";
                foreach($keys as $key){
                    echo "<th scope='col'>".$key."</th>"; // display the attributes as headers for the table
                }
                echo "</tr>";
                foreach($supervisor_table as $row){ // loop through each row of the table (the 2d array)
                    echo "<tr>";
                    foreach($row as $value){
                        echo "<td>".$value."</td>"; // display the records (values) in the HTML table
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
            ?>
        </center>
    </body>
</html>
