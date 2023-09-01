<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/patient.class.php";
    require "../../classes/models/prescription.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prescription Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Select Prescription</h1>
        
        <!-- The search form -->
        <form method="GET" action="">
            <h4>Search patient:</h4>
            <label for="ssn">SSN:</label>
            <input type="number" id="ssn" name="ssn" required>
            <input type="submit" value="Search">
        </form><br>

        <?php
            $prescription = new prescription();

            PageView::showPatientDetails();
            // Check if the search form was submitted
            if (isset($_GET['ssn'])) {
                // Get the search criteria from the form
                $ssn = $_GET['ssn'];

                // Filter the data based on the search criteria
                $prescription_table = $prescription->getPrescriptionsBySSN($ssn);
            } else {
                // Get all prescriptions
                $prescription_table = $prescription->getAllprescriptions();
            }

            TableView::showSelectTable($prescription_table, 'pharmacy', 'dispense_drugs');
        ?>

    </body>
</html>
