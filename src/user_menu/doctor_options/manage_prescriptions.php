<?php
 require "../../classes/connection.class.php";
 require "../../classes/databasehandler.class.php";
 require "../../classes/models/patient.class.php";
 require "../../classes/models/drug.class.php";
 require "../../classes/views/pageview.class.php";
 require "../../classes/views/tableview.class.php";
 require "../../classes/views/dataview.class.php";



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescriptions page</title>
    <link rel="stylesheet" href="../../styles/form_styles/view_prescriptions.css">
</head>
<body>
    <!--page topbar-->
    <div class="topbar">
        <h1>MedicaMystic Dispensary</h1>
    </div>
    <div class="maincontainer">
        <div class="main-header">
            <h2>Manage Prescriptions</h2>
        </div>
        <div class="main-content">
            <!--search components-->
            <div class="main-left">
                <form class="drug-search" method="POST" action="../../search/search_drugs.php">
                    <div class="search-labels">
                        <div class="drug-id-option">
                            <label for="drug_id">Search ID</label>
                            <input type="radio" name="search_type" value="drug_id" checked>
                        </div>
                        <div class="trade_name_option">
                            <label for="trade_name">Search Name</label>
                            <input type="radio" name="search_type" value="trade_name">
                        </div>
                        <label for="quantity">Quantity</label>
                        <label
                    </div>
                    <!--Dropdowns populated by database-->
                    <div class="search-dropdowns">
                        <!--drug_IDs-->
                        <?php
                            $drug = new Drug();
                            $drug_IDs = $drug->getIDs();
                            DataView::fillDropdown($drug_IDs);
                        ?>
                        <!--trade_names-->
                        <?php
                            $drug = new Drug();
                            $trade_names = $drug->getTradeNames();
                            DataView::fillDropdown($trade_names);
                        ?>
                        <input type="number" min="1" max="100" name="selected_quantity" required>
                        <input type="hidden" name="patient_ssn" value="<?php echo $patient_ssn?>">
                    </div>
                    <div class="search-button">
                        <button type="submit" name="search" value="search_drug" class="btn-actions btn-search">Confirm</button>     
                    </div>     
                </form>
                <br>
                <div class="patient-details-container">
                    <!--Details are revealed here after clicking 'search'-->
                    <div class="patient-details">
                        <span>Patient SSN:  <?php echo $patient_id?></span>
                        <span>Drug ID:  <?php echo $trade_name; ?></span>
                        <span>Formula: <?php echo $patient_formula; ?></span>
                        <span>Administration:  <?php echo $administration_method; ?></span>
                        <span>Dosage: <?php echo $dosage_mg; ?></span>
                        <span>Quantity: <?php echo $quantity; ?></span>
                        <span>patient Price:  <?php echo $patient_price; ?></span>
                        <span>Expiry date:  <?php echo $expiry_date; ?></span>
                    </div>
                    <div class="add-button">
                        <button type="button" class="btn-actions btn-add">Add</button>
                    </div>
                </div>
            </div>
    
            <!--Table components-->
            <div class="main-right">
                <div class="patients-table-container">
                    <table class="patients-table">
                        <thead>
                            <tr>
                                <th>patient ID</th>
                                <th>Trade Name</th>
                                <th>Formula</th>
                                <th>Administration</th>
                                <th>Dosage (mg) </th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody class="patients-table-data">
                            <!-- Populated by clicking the 'add' button -->
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="table-buttons">
                    <button type="button" class="btn-actions btn-clear">Clear</button>
                    <button type="button" class="btn-actions btn-dispense">Dispense</button>
                </div>
            </div>
        </div>
    
    
</body>
</html>