<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/drug.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Drug Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    </head>
    <body>
        <h1>Drugs Table</h1>
            <?php
            $drug = new Drug();
            $drug_table = $drug->getAllDrugs();
            TableView::showEditableTable($drug_table, 'drug');
            ?>
    </body>
</html>
