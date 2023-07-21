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
    </head>
    <body>
        <h1>Select Patient</h1>

        <!-- The search form -->
        <form method="GET" action="">
            <h4>Search patient:</h4>
            <label for="ssn">SSN:</label>
            <input type="number" id="ssn" name="ssn" required>
            <input type="submit" value="Search">
        </form><br>

        <?php

        // Render the patient details:
        $patient_table = PageView::showPatientDetails();
        TableView::showSelectTable($patient_table, 'doctor', 'prescribe');
        ?>
    </body>
</html>
