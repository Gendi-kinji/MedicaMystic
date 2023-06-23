<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/doctor.class.php";
    require "../classes/views/pageview.class.php";
    require "../classes/views/tableview.class.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Doctor Details</title>
        <link rel="stylesheet" href="../styles/table_styles.css">
    </head>
    <body>
        <div class="main-container">
            
            <h1>Doctors Table</h1>
            <?php
            $doctor = new Doctor();
            $doctor_table = $doctor->getAllDoctors();
            TableView::showTable($doctor_table, 'doctor');
            ?>
        </div>
    </body>
</html>
