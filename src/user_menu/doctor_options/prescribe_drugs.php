<?php
 require "../../classes/connection.class.php";
 require "../../classes/databasehandler.class.php";
 require "../../classes/models/patient.class.php";
 require "../../classes/models/drug.class.php";
 require "../../classes/views/pageview.class.php";
 require "../../classes/views/tableview.class.php";
 require "../../classes/views/dataview.class.php";

 // Getting the current date:
 $date_today = date("Y-m-d");

 // Initializing page variables

 $patient_ssn = "";
 $drug_id = "";
 $trade_name = "";
 $drug_formula = "";
 $quantity = "";
 $dosage_mg = "";
 $dosage_schedule = "";
 $prescription_date = "";

 session_start();
    $keys = [
        'drug_id', 
        'trade_name', 
        'drug_formula', 
        'quantity',
        'dosage_mg',
        'dosage_schedule', 
        'prescription_date', 
        'patient_ssn'
    ];

    $all_keys_exist = true;
    foreach ($keys as $key) {
        if (!array_key_exists($key, $_SESSION)) {
            $all_keys_exist = false;
            break;
        }
    }

    if ($all_keys_exist) {
        $drug_id = $_SESSION['drug_id'];
        $trade_name = $_SESSION['trade_name'];
        $drug_formula = $_SESSION['drug_formula'];        
        $quantity = $_SESSION['quantity'];
        $dosage_mg = $_SESSION['dosage_mg'];
        $dosage_schedule = $_SESSION['dosage_schedule'];
        $prescription_date = $_SESSION['prescription_date'];
        $patient_ssn = $_SESSION['patient_ssn'];
    }

    if(!empty($_GET['patient_ssn'])){
        $patient_ssn = $_GET['patient_ssn'];
    }

   # print_r($_SESSION);


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescriptions page</title>
    <link rel="stylesheet" href="../../styles/form_styles/prescribe_drugs.css">
</head>
<body>
    <!--scripts-->
    <script type="module" src="../../scripts/prescribe_drugs.js"></script>
    
    <!--page topbar-->
    <div class="topbar">
        <h1>MedicaMystic Dispensary</h1>
    </div>
    <div class="maincontainer">
        <div class="main-header">
            <h2>Prescribe Drugs</h2>
        </div>
        <div class="main-content">
            <!--search components-->
            <div class="main-left">
                <form class="drug-search" method="POST" action="../../search/search_drugs.php">
                    <div class="search-labels">
                        <div class="drug-id-option">
                            <label for="drug_id">Search ID</label>
                            <input type="radio" name="search_type" value="drug_id" checked>
                        </div><br>
                        <div class="trade_name_option">
                            <label for="trade_name">Search Name</label>
                            <input type="radio" name="search_type" value="trade_name">
                        </div><br>
                       <!-- <label for="patient_ssn">Patient SSN</label><br>-->
                        <label for="quantity">Quantity</label><br>
                        <label for="prescription_date">Select Date</label><br>
                        <label for="dosage_schedule">Dosage Schedule</label>
                    </div>
                    <!--Dropdowns populated by database-->
                    <div class="search-dropdowns">
                        <!--drug_IDs-->
                        <?php
                            $drug = new Drug();
                            $drug_IDs = $drug->getIDs();
                            DataView::fillDropdown($drug_IDs);
                        ?><br>
                        <!--trade_names-->
                        <?php
                            $drug = new Drug();
                            $trade_names = $drug->getTradeNames();
                            DataView::fillDropdown($trade_names);
                        ?><br>
                        <input type="number" min="1" max="100" name="selected_quantity" required><br>
                        <input type="date" id="prescription_date" name="prescription_date" value="<?php echo $date_today?>" required><br>
                        <textarea 
                            rows="5" 
                            cols="20" 
                            id="dosage_schedule" 
                            name="dosage_schedule" 
                            placeholder="Enter dosage schedule (100 max characters) e.g. once every 6 hours" 
                            maxlength="100"
                            required
                        ></textarea>
                        <!--hidden input type to submit the patient SSN-->
                        <input type="hidden" id="patient_ssn" name="patient_ssn" value=<?php echo $patient_ssn?>>
                        <!--sending the page_type-->
                        <input type="hidden" id="page_type" name="page_type" value="prescription">
                    </div>
                    <div class="search-button">
                        <button type="submit" name="search" value="search_drug" class="btn-actions btn-search">Confirm</button>     
                    </div>     
                </form>
                <br>
                <div class="prescription-details-container">
                    <!--Details are revealed here after clicking 'search'-->
                    <div class="prescription-details">
                        <span>Patient SSN:  <?php echo $patient_ssn?></span>
                        <span>Drug ID:  <?php echo $drug_id; ?></span>
                        <span>Trade Name: <?php echo $trade_name?></span>
                        <span>Drug Formula: <?php echo $drug_formula?></span>
                        <span>Quantity: <?php echo $quantity?></span>
                        <span>Dosage: <?php echo $dosage_mg?></span>
                        <span>Dosage Schedule: <?php echo $dosage_schedule; ?></span>
                        <span>Date:  <?php echo $prescription_date; ?></span>
                    </div>
                    <div class="add-button">
                        <button type="button" class="btn-actions btn-add">Add</button>
                    </div>
                </div>
            </div>
    
            <!--Table components-->
            <div class="main-right">
                <div class="prescriptions-table-container">
                    <table class="prescriptions-table">
                        <thead>
                            <tr>
                                <th>Patient SSN</th>
                                <th>Drug ID</th>
                                <th>Trade Name</th>
                                <th>Drug Formula</th>
                                <th>Quantity</th>
                                <th>Dosage</th>
                                <th>Dosage Schedule</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody class="prescriptions-table-data">
                            <!-- Populated by clicking the 'add' button -->
                        </tbody>
                    </table>
                </div>
                <br>
                <div class="table-buttons">
                    <button type="button" class="btn-actions btn-clear">Clear</button>
                    <button type="button" class="btn-actions btn-prescribe">Prescribe</button>
                </div>
            </div>
        </div>
    
    
</body>
</html>