<?php
require '../classes/connection.class.php';
require '../classes/databasehandler.class.php';
require '../classes/models/drug.class.php';

if (isset($_POST['search'])) {
    // Get the selected value from the dropdown list
    $drug_id = $_POST['drug_id'];
    $trade_name = $_POST['trade_name'];
    $search_type = $_POST['search_type'];

    $drug = new Drug();
    switch ($search_type) {
        case "drug_id":
            $drug_row = $drug->getDrugByID($drug_id);
            break;
        case "trade_name":
            $drug_row = $drug->getDrugByTradeName($trade_name);
            break;
        default:
            echo json_encode(["error" => "Error checking for selection of search type."]);
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

    // Return a JSON response, indicating a successful process:
    echo json_encode(["success" => true]);
    exit();
    

} else {
    echo json_encode(["error" => "Search parameter not set."]);
    exit();
}
?>
