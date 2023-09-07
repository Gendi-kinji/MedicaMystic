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
            $prescription = new prescription();
            $patient_ssn = null;

            session_start();
            // Check if the search form was submitted
            if (isset($_SESSION['patient_ssn'])) {
                // Get the search criteria from the form
                $patient_ssn = $_SESSION['patient_ssn'];

                // Filter the data based on the search criteria
                $presc_table = $prescription->getPrescriptionsBySSN($patient_ssn);

            } else {
                echo '<span style="color: red;">Patient SSN not set</span>';
            }

            TableView::showSelectTable($presc_table, 'patient', 'patient_presc_items');
        ?>

    </body>
</html>
