<?php
    require_once "../../inc/autoloader.inc.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prescription Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Patient Prescriptions</h1>

        <?php
            $prescription_item = new PrescriptionItem();

            session_start();
            // Check if the search form was submitted
            if (isset($_GET['id'])) {
                // Get the search criteria from the form
                $presc_id = $_GET['id'];

                // Filter the data based on the search criteria
                $presc_items_table = $prescription_item->getPrescriptionItemsByPrescId($presc_id);

            } else {
                echo '<span style="color: red;">Prescription id not set. Please select a prescription item</span>';
            }

            TableView::showReadOnlyTable($presc_items_table);
        ?>

    </body>
</html>
