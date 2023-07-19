<?php
<<<<<<< HEAD:src/view_tables/view_prescriptions.php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/prescription.class.php";
    require "../classes/views/pageview.class.php";
    require "../classes/views/tableview.class.php";
=======
    require "../..classes/connection.class.php";
    require "../..classes/databasehandler.class.php";
    require "../..classes/models/pharmacy.class.php";
    require "../..classes/views/pageview.class.php";
    require "../..classes/views/tableview.class.php";
>>>>>>> 23a935a22e014eae5c693d1f4e7310e7c1bd851f:src/tables/editable/manage_pharmacy.php
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmacy Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    </head>
    <body>
        <h1>Prescription Table</h1>
            <?php
            $prescription = new Prescription();
            $prescription_table = $prescription->getAllPrescriptions();
            TableView::showEditableTable($prescription_table, 'prescription');
            ?>
    </body>
</html>
