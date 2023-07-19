<?php
    require "../../connection.class.php";
    require "../../databasehandler.class.php";
    require "../../models/prescriptions.class.php";
    require "../../views/pageview.class.php";
    require "../../views/tableview.class.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmacy Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    </head>
    <body></body><h1>Prescription Table</h1>
            <?php
            $prescription = new Prescription();
            $prescription_table = $prescription->getAllPrescriptions();
            TableView::showEditableTable($prescription_table, 'prescription');
            ?>
    </body>
</html>
