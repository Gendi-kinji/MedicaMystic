<?php
if (isset($_POST["submit"])) {
   // Get the form data:
   $drugData = [
      'trade_name' => $_POST['trade_name'],
      'drug_formula' => $_POST['drug_formula'],
      'drug_category' => $_POST['drug_category'],
      'administration_method' => $_POST['administration_method'],
      'dosage_mg' => $_POST['dosage_mg'],
      'drug_quantity' => $_POST['drug_quantity'],
      'drug_price' => $_POST['drug_price'],
      'expiry_date' => $_POST['expiry_date'],
   ];

   //Restart the session to reclaim the id:
   session_start();
   $id = $_SESSION['id'];

   // Include important files:
   require_once "../inc/autoloader.inc.php";

   // Process the form:
   $drugFormProcessor = new DrugFormProcessor();
   $form_processed = $drugFormProcessor->processForm($drugData, $id, 'update');

   if ($form_processed) {
      // redirect to form page:
      header('Location: ../tables/editable/manage_drugs.php?error=none');
      exit();
   } else {
      // redirect to form page:
      header('Location: ../tables/editable/manage_drugs.php?error=addfailed');
      exit();
   }
}
?>