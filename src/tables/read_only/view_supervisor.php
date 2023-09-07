
<?php
 require_once "../../inc/autoloader.inc.php";      
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Supervisor Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Supervisor Table</h1>
            <?php
                $supervisor= new supervisor();
                $supervisor_table = $supervisor->getAllsupervisors();
                TableView::showReadOnlyTable($supervisor_table);
            ?>
        </body>
</html>
