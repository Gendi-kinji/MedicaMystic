<?php
if(isset($_POST["submit"])){
     // Grab the data submitted for updating and set it as an array
     $drug_data = [
        'trade_name'=> $_POST['trade_name'],
        'drug_formula' => $_POST['drug_formula'],
        'administration_method'=> $_POST['administration_method'],
        'dosage_mg'=>$_POST['dosage_mg'],
        'drug_quantity'=>$_POST['drug_quantity'],
        'drug_price' => $_POST['drug_price'],
        'expiry_date' => $_POST['expiry_date']
     ];

     //Restart the session to reclaim the id:
     session_start();
     $id = $_SESSION['id'];

     // Include important files:
     require_once "../inc/autoloader.inc.php";

     //Instantiate the drug class:
     $drug = new Drug();
     $drug->updateDrug($drug_data, $id);

     //Go back to  page after updating successfully:
     header("location: ../tables/editable/manage_drugs.php?error=none");


}
?>