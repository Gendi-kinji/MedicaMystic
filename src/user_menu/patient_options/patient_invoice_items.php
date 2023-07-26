<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/invoice-item.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Patient Invoices</h1>

        <?php
            $invoice_item = new InvoiceItem();

            session_start();
            // Check if the search form was submitted
            if (isset($_GET['id'])) {
                // Get the search criteria from the form
                $invoice_id = $_GET['id'];

                // Filter the data based on the search criteria
                $invoice_items_table = $invoice_item->getInvoiceItemsByInvoiceId($invoice_id);

            } else {
                echo '<span style="color: red;">invoice id not set. Please select a invoice item</span>';
            }

            TableView::showReadOnlyTable($invoice_items_table);
        ?>

    </body>
</html>
