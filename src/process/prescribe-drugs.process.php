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
  # print_r($prescribed_drugs);

  //checking if prescribed_drugs array is empty
  if(empty($prescribed_drugs)){
    http_response_code(400);
    echo 'Invalid data';
    exit;
  }

  // Instantiate objects of the prescription and prescription_items class
  $prescription = new Prescription();
  $prescription_item = new PrescriptionItem();

  // Insert prescription data into database
  $prescriptionData = [
    'patient_ssn'=>$prescribed_drugs[0]['patientSSN'],
    'presc_date'=>$prescribed_drugs[0]['prescriptionDate']
  ];

  $prescription_id = $prescription->addPrescription($prescriptionData);

  // Loop through each drug_id sent in the array and add records
  foreach($prescribed_drugs as $drug){

    // Details for prescription items
    $drug_id = $drug['drugId'];
    $prescribed_quantity = $drug['prescribedQuantity'];
    $dosage_schedule = $drug['dosageSchedule'];

    // Storing data in an array
    $itemsData = [
      'prescription_id'=>$prescription_id,
      'quantity'=>$prescribed_quantity,
      'dosage_schedule'=>$dosage_schedule,
    ];

    $prescription_item->addPrescriptionItem($itemsData);
  }

  // Success
  echo "Drugs prescribed successfully";
} else {

  // Invalid request method
  http_response_code(405);
  echo 'Invalid request method';
}

?>
