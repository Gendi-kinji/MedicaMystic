
<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/prescription.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
        
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prescriptions</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Prescriptions History</h1>
            <?php
                $prescription= new prescription();
                $prescription_view = $prescription->getAllPrescriptionDetails();
                TableView::showReadOnlyTable($prescription_view);
            ?>
        </body>
</html>
