<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/prescriptions.class.php";
    require "../classes/views/pageview.class.php";
    require "../classes/views/tableview.class.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmacy Details</title>
        <link rel="stylesheet" href="../styles/table_styles.css">
    </head>
    <body>
        <h1>Pharmacy Table</h1>
            <?php
            $pharmacy = new Pharmacy();
            $pharmacy_table = $pharmacy->getAllPharmacies();
            TableView::showEditableTable($pharmacy_table, 'pharmacy');
            ?>
    </body>
</html>
