
<?php
require_once "../../inc/autoloader.inc.php";       
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice Item Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Invoice Items Table</h1>
            <?php
                $invoice_item = new InvoiceItem();
                $invoice_item_table = $invoice_item->getAllInvoiceItems();
                TableView::showReadOnlyTable($invoice_item_table);
            ?>
        </body>
</html>
