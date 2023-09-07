
<?php
require_once "../../inc/autoloader.inc.php";        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prescription Items Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Prescription Items Table</h1>
            <?php
                $presc_item = new PrescriptionItem();
                $presc_item_table = $presc_item->getAllPrescriptionItems();
                TableView::showReadOnlyTable($presc_item_table);
            ?>
        </body>
</html>
