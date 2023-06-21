<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/patient.class.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patient Details</title>
        <link rel="stylesheet" href="../styles/table_styles.css">
    </head>
    <body>
        <h1>Patients Table</h1>
        <center>
            <?php
            $patient = new Patient();
            $patient_table = $patient->getAllPatients();
            if(count($patient_table)>0){
                echo "<table>";
                $keys = array_keys($patient_table[0]); // get the columns of the table from the first array
                echo "<tr>";
                foreach($keys as $key){
                    echo "<th scope='col'>".$key."</th>"; // display the attributes as headers for the table
                }
                echo "</tr>";
                foreach($patient_table as $row){ // loop through each row of the table (the 2d array)
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
