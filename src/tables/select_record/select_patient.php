<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/patient.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Patient Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Select Patient</h1>
            <?php
            $patient = new patient();
            $patient_table = $patient->getAllpatients();
            TableView::showSelectTable($patient_table, 'doctor', 'prescribe');
            ?>
    </body>
</html>
