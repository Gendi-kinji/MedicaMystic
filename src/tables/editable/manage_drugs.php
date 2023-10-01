<?php
require_once "../../inc/autoloader.inc.php";
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
        <!-- Back to dashboard button -->
        <a href="../../drug_dashboard.php" class="btn-links btn-dashboard">Back to Dashboard</a>
            <?php
            $drug = new Drug();
            $drug_table = $drug->getAllDrugs();
            TableView::showEditableTable($drug_table, 'drug');
            ?>
    </body>
</html>
