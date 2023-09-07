
<?php
require_once "../../inc/autoloader.inc.php";      
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prescriptions</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Prescriptions Table</h1>
            <?php
                $prescription= new prescription();
                $prescription_table = $prescription->getAllprescriptions();
                TableView::showReadOnlyTable($prescription_table);
            ?>
        </body>
</html>
