<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/patient.class.php";
    require "../../classes/models/invoice.class.php";
    require "../../classes/models/prescription.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
    
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>invoice Details</title>
        <link rel="stylesheet" href="../../styles/table_styles.css">
    <body>
        <h1>Patient Invoices</h1>

        <?php
            $invoice = new Invoice();
            $prescription = new Prescription();

            $patient_ssn = null;
            session_start();
            // Check if the search form was submitted
            if (isset($_SESSION['patient_ssn'])) {
                // Get the search criteria from the form
                $patient_ssn = $_SESSION['patient_ssn'];

                // Filter the data based on the search criteria
                $presc_table = $prescription->getPrescriptionsBySSN($patient_ssn);
                
                // Setting the prescription ids
                $presc_ids = [];

                foreach($presc_table as $presc_row){
                    array_push($presc_ids, $presc_row['prescription_id']);
                }

                $invoice_table = [];
                for($i=0; $i<count($presc_ids); $i++){
                    $invoice_record = $invoice->getInvoicesByPrescId($presc_ids[$i]);
                    array_push($invoice_table, $invoice_record[0]);
                }
                
            } else {
                echo '<span style="color: red;">Patient SSN not set</span>';
            }

            TableView::showSelectTable($invoice_table, 'patient', 'patient_invoice_items');
        ?>

    </body>
</html>
