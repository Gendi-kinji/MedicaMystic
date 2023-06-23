<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/patient.class.php";
    require "../classes/views/pageview.class.php";
    require "../classes/views/tableview.class.php";
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
            <?php
            $patient = new Patient();
            $patient_table = $patient->getAllPatients();
            TableView::showTable($patient_table, 'patient');
            ?>
    </body>
</html>
