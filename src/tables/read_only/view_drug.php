
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
    <body>
        <h1>Drugs Table</h1>
            <?php
                $drug= new drug();
                $drug_table = $drug->getAlldrugs();
                TableView::showReadOnlyTable($drug_table);
            ?>
        </body>
</html>
