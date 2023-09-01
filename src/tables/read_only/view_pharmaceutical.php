
<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/pharmaceutical.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pharmaceutical Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Pharmaceuticals Table</h1>
            <?php
                $pharmaceutical= new pharmaceutical();
                $pharmaceutical_table = $pharmaceutical->getAllpharmaceuticals();
                TableView::showReadOnlyTable($pharmaceutical_table);
            ?>
        </body>
</html>
