<?php

require '../classes/connection.class.php';
require '../classes/databasehandler.class.php';
require '../classes/models/prescription.class.php';
require '../classes/models/prescription-item.class.php';

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get JSON data from request body
  $json = file_get_contents('php://input');
  $prescribed_drugs = json_decode($json, true);
  print_r($prescribed_drugs);

  // Instantiate objects of the invoice and invoice_items class
  $prescription = new Prescription();
  $prescription_item = new PrescriptionItem();

  // Insert invoice data into database
  $prescriptionData = [
    'patient_ssn'=>$dispensed_drug[0]['patientSSN']
  ];

  $prescription_id = $prescription->addPrescription($prescriptionData);

 // prescribedDrugs.push({patientSSN, drugId, prescribedQuantity, dosageSchedule, prescriptionDate});

  // Loop through each drug_id sent in the array and add records
  foreach($prescribed_drugs as $drug){

    // Details for invoice items
    $drug_id = $drug['drugId'];
    $prescribed_quantity = $drug['prescribedQuantity'];
    $dosage_schedule = $drug['dosageSchedule'];
    $presc_date = $drug['prescriptionDate'];

    // Storing data in an array
    $itemsData = [
      'prescription_id'=>$prescription_id,
      'drug_id'=>$drug_id,
      'quantity'=>$quantity,
      'total_price'=>$total_price
    ];

    $invoice_item->addInvoiceItem($itemsData);
  }

  // Relocate to dispense drugs page
  echo "Drugs prescribed successfully";
} else {

  // Invalid request method
  http_response_code(405);
  echo 'Invalid request method';
}

?>
