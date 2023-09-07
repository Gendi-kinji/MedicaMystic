
<?php
require_once "../../inc/autoloader.inc.php";  
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Doctors Table</h1>
            <?php
                $doctor= new doctor();
                $doctor_table = $doctor->getAlldoctors();
                TableView::showReadOnlyTable($doctor_table);
            ?>
        </body>
</html>
