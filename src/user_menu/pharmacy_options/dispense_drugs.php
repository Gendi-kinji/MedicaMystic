<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
    require "../../classes/models/drug.class.php";
    require "../../classes/views/pageview.class.php";
    require "../../classes/views/tableview.class.php";
    require "../../classes/views/dataview.class.php";

    // Details for drug details container:$
    $prescription_id = "";
    $drug_id = "";
    $trade_name = "";
    $drug_formula = "";
    $administration_method = "";
    $quantity = 0;
    $dosage_mg = "";
    $drug_price = "";
    $expiry_date = "";

    session_start();
    $keys = [
        'drug_id', 
        'trade_name', 
        'drug_formula', 
        'administration_method',
        'dosage_mg',
        'quantity', 
        'drug_price', 
        'expiry_date',
        'prescription_id'
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
        $administration_method = $_SESSION['administration_method'];
        $dosage_mg = $_SESSION['dosage_mg'];
        $quantity = $_SESSION['quantity'];
        $drug_price = $_SESSION['drug_price'];
        $expiry_date = $_SESSION['expiry_date'];
        $prescription_id = $_SESSION['prescription_id'];

    
    }

    if(!empty($_GET['prescription_id'])){
        $prescription_id = $_GET['prescription_id'];
    }
    
       print_r($_SESSION);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/form_styles/dispense_drugs.css">
    <title>Dispense Drugs</title>
</head>
<body>
    <!--Dispense drugs page script-->
    <script type="module" src="../../scripts/dispense_drugs.js"></script>
 
    <!--page topbar-->
    <div class="topbar">
        <h1>MedicaMystic Dispensary</h1>
    </div>
    <!--container for the main content of the page-->
    <div class="maincontainer">
        <div class="main-header">
            <h2>Dispense Drugs</h2>
        </div>
        <div class="main-content">
            <!--search components-->
            <div class="main-left">
                <h4>Choose search type (from radio)</h4>
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
                        <input type="hidden" id="prescription_id" name="prescription_id" value="<?php echo $prescription_id?>">
                        <input type="hidden" id="page_type" name="page_type" value="dispense">
                    </div>
                    <div class="search-button">
                        <button type="submit" name="search" value="search_drug" class="btn-actions btn-search">Search</button>     
                    </div>     
                </form>
                <br>
                <div class="drug-details-container">
                    <!--Details are revealed here after clicking 'search'-->
                    <div class="drug-details">
                        <span>Prescription ID: <?php echo $prescription_id; ?></span>
                        <span>Drug ID:  <?php echo $drug_id?></span>
                        <span>Trade Name:  <?php echo $trade_name; ?></span>
                        <span>Formula: <?php echo $drug_formula; ?></span>
                        <span>Administration:  <?php echo $administration_method; ?></span>
                        <span>Dosage: <?php echo $dosage_mg; ?></span>
                        <span>Quantity: <?php echo $quantity; ?></span>
                        <span>Drug Price:  <?php echo $drug_price; ?></span>
                        <span>Expiry date:  <?php echo $expiry_date; ?></span>
                    </div>
                    <div class="add-button">
                        <button type="button" class="btn-actions btn-add">Add</button>
                    </div>
                </div>
            </div>
    
            <!--Table components-->
            <div class="main-right">
                <div class="drugs-table-container">
                    <table class="drugs-table">
                        <thead>
                            <tr>
                                <th>Prescr ID</th>
                                <th>Drug ID</th>
                                <th>Trade Name</th>
                                <th>Formula</th>
                                <th>Administration</th>
                                <th>Dosage (mg) </th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Expiry Date</th>
                            </tr>
                        </thead>
                        <tbody class="drugs-table-data">
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
    </div>
</body>
</html>