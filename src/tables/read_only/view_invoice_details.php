
<?php
require_once "../../inc/autoloader.inc.php";      
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Dispensed Drugs History</h1>
            <?php
                $invoice= new invoice();
                $invoice_table = $invoice->getAllInvoiceDetails();
                TableView::showReadOnlyTable($invoice_table);
            ?>
        </body>
</html>
