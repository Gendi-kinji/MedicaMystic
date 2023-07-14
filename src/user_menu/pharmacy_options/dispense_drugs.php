<?php
    require "../../classes/connection.class.php";
    require "../../classes/databasehandler.class.php";
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
    <link rel="stylesheet" href="../../styles/form_styles/dispense_drugs.css">
    <title>Dispense Drugs</title>
</head>
<body>
    <div class="topbar">
        <h1>MedicaMystic Dispensary</h1>
    </div>
    <div class="maincontainer">
        <div class="main-header">
            <h2>Dispense Drugs</h2>
        </div>
        <div class="main-content">
            <div class="main-left">
                <div class="drug-search">
                    <div class="search-labels">
                        <span>Search by ID:</span>
                        <span>Search by name:</span>
                    </div>
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
                    </div>
                    <div class="search-button">
                        <button type="button" class="btn-actions btn-search">Search</button>     
                    </div>     
                </div>
                <br>
                <div class="drug-details-container">
                    <div class="drug-details">
                        <span>Trade Name:<span></span></span>
                        <span>Dosage:<span></span></span>
                        <span>Quantity:<span></span></span>
                        <span>Drug Price:<span></span></span>
                        <span>Expiry date:<span></span></span>
                    </div>
                    <div class="add-button">
                        <button type="button" class="btn-actions btn-add">Add</button>
                    </div>
                </div>
            </div>
    
            <div class="main-right">
                <div class="drugs-table">
                    <?php
                        $drug = new Drug();
                        $drug_table = $drug->getAllDrugs();
                        TableView::showReadOnlyTable($drug_table, 'drug');
                    ?>
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