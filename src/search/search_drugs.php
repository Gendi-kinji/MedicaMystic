<?php
require_once "../inc/autoloader.inc.php";

if (isset($_POST['search'])) {
    // Get the selected value from the dropdown list
    $drug_id = $_POST['drug_id'];
    $trade_name = $_POST['trade_name'];
    $selected_quantity = $_POST['selected_quantity'];
    $search_type = $_POST['search_type'];
    $page_type = $_POST['page_type'];
    
    // Check if empty
    if (
    empty($drug_id) || 
    empty($trade_name) || 
    empty($selected_quantity) || 
    empty($search_type) ||
    empty($page_type)
    ) {
        
        echo json_encode(["error"=>"Some data is missing. Please fill in all fields."]);
        exit();
    } else {
        // Your code here
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

        /// Validating the quantity selected:
        $existing_quantity = $drug_row[0]['drug_quantity'];

        // Check if the selected quantity is a valid number
        if (!is_numeric($selected_quantity)) {
            echo json_encode(["error" => "Selected quantity is not a valid number."]);
            exit();
        }

        if($existing_quantity === 0){
            echo json_encode (["error" => "Drug is out of stock."]);
            exit();
        } elseif ($selected_quantity === 0 || empty($selected_quantity)){
            echo json_encode (["error" => "please enter a value."]);
            exit();
        } else{
            if ($existing_quantity >= $selected_quantity) {
                $quantity = $selected_quantity;
            } elseif ($existing_quantity < $selected_quantity) {
                echo json_encode(["error" => "Quantity selected exceeds available quantity in stock."]);
                exit();
            } else {
                echo json_encode (["error" => "Setting quantity failed."]);
                exit();
            }
        }



        // Extract values and storing them in the session superglobal:
        session_start();
        $_SESSION['drug_id'] = $drug_row[0]['drug_id'];
        $_SESSION['trade_name'] = $drug_row[0]['trade_name'];
        $_SESSION['drug_formula'] = $drug_row[0]['drug_formula'];
        $_SESSION['dosage_mg'] = $drug_row[0]['dosage_mg'];
        $_SESSION['quantity'] = $quantity;

        // Checking if values exist in the post array before adding them into the session variable:

            //dispense_drugs..php
        if($page_type === 'dispense'){

            // for dispense_drugs.php
            if(!empty($_POST['prescription_id'])&&is_numeric($_POST['prescription_id'])){
                $prescription_id = $_POST['prescription_id']; //set the prescription id

                $_SESSION['administration_method'] = $drug_row[0]['administration_method'];
                $_SESSION['drug_price'] = $drug_row[0]['drug_price'];
                $_SESSION['expiry_date'] = $drug_row[0]['expiry_date'];
                $_SESSION['prescription_id'] = $prescription_id;
            }else{
                echo json_encode(["error" => "Prescription id not set"]);
                exit();
            }

            // Return a JSON response, indicating a successful process:
            echo json_encode(["success" => true]);
            exit();


            //prescribe_drugs.php
        } elseif($page_type === 'prescription'){

            // for prescribe_drugs.php
            if(!empty($_POST['patient_ssn'])&&is_numeric($_POST['patient_ssn'])){
                $patient_ssn = $_POST['patient_ssn']; //setting the patient ssn

                if(!empty($_POST['dosage_schedule']) && !empty($_POST['prescription_date'])){
                    
                    //Check max_length for dosage schedule input:
                    $maxlength = 100;

                    if(strlen($_POST['dosage_schedule'])>$maxlength){
                        echo json_encode(["error" => "Dosage schedule exceeds 100 characters!"]);
                    }
                    $_SESSION['dosage_schedule'] = $_POST['dosage_schedule'];
                    $_SESSION['prescription_date'] = $_POST['prescription_date'];
                    $_SESSION['patient_ssn'] = $patient_ssn;
    
                    // Return a JSON response, indicating a successful process:
                    echo json_encode(["success" => true]);
                    exit();
    
                }else{
                    echo json_encode(["error" => "Schedule and date are empty"]);
                    exit();
                }
            } else{
                echo json_encode(["error" => "Patient SSN not set"]);
                exit();
            }
            
        }
    }

} else {
    echo json_encode(["error" => "Search parameter not set."]);
    exit();
}
?>