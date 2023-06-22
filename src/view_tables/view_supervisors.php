<?php
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/supervisor.class.php";
    require "../classes/views/table.class.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Supervisor Details</title>
        <link rel="stylesheet" href="../styles/table_styles.css">
    </head>
    <body>
        <h1>Supervisors Table</h1>
        <center>
            <?php
            $supervisor = new Supervisor();
            $supervisor_table = $supervisor->getAllSupervisors();
            TableView::showTable($supervisor_table);
            ?>
        </center>
    </body>
</html>
