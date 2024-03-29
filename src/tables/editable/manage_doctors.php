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
    </head>
    <body>
        <div class="main-container">
            
            <h1>Doctors Table</h1>
            <?php
            $doctor = new Doctor();
            $doctor_table = $doctor->getAllDoctors();
            TableView::showEditableTable($doctor_table, 'doctor');
            ?>
        </div>
    </body>
</html>
