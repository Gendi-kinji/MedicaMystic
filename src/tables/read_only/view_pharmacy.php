
<?php
require_once "../../inc/autoloader.inc.php";       
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmacy Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Pharmacies Table</h1>
            <?php
                $pharmacy= new pharmacy();
                $pharmacy_table = $pharmacy->getAllpharmacies();
                TableView::showReadOnlyTable($pharmacy_table);
            ?>
        </body>
</html>
