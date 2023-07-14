<?php
require '../classes/connection.class.php';
require '../classes/databasehandler.class.php';
require '../classes/models/drug.class.php';

if (isset($_GET['search'])) {
    // Get the selected value from the dropdown list
    $drug_id = $_GET['drug_id'];
    $trade_name = $_GET['trade_name'];
    $search_type = $_GET['search_type'];

    $drug = new Drug();
    switch ($search_type) {
        case "drug_id":
            $drug_row = $drug->getDrugByID($drug_id);
            break;
        case "trade_name":
            $drug_row = $drug->getDrugByTradeName($trade_name);
            break;
        default:
            echo("Error checking for selection of search type.<br>");
            break;
    }

    // Extract values and storing them in the session superglobal:

    session_start();
    $_SESSION['drug_id'] = $drug_row[0]['drug_id'];
    $_SESSION['trade_name'] = $drug_row[0]['trade_name'];
    $_SESSION['drug_formula'] = $drug_row[0]['drug_formula'];
    $_SESSION['administration_method'] = $drug_row[0]['administration_method'];
    $_SESSION['drug_price'] = $drug_row[0]['drug_price'];
    $_SESSION['expiry_date'] = $drug_row[0]['expiry_date'];

    header("Location: ../user_menu/pharmacy_options/dispense_drugs.php?error=none");
    exit();
    

}
?>
