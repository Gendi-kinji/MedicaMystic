<?php

require '../classes/connection.class.php';
require '../classes/databasehandler.class.php';
require '../classes/models/invoice.class.php';
require '../classes/models/invoice-item.class.php';

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get JSON data from request body
  $json = file_get_contents('php://input');
  $dispensed_drugs = json_decode($json, true);
  print_r($dispensed_drugs);

  // Grab the patient SSN
  $patient_ssn = 7;

  // Instantiate objects of the invoice and invoice_items class
  $invoice = new Invoice();
  $invoice_item = new InvoiceItem();

  // Insert invoice data into database
  $invoiceData = [
    'patient_ssn'=>$patient_ssn
  ];

  $invoice_id = $invoice->addInvoice($invoiceData);


  // Loop through each drug_id sent in the array and add records
  foreach($dispensed_drugs as $drug){

    // Details for invoice items
    $drug_id = $drug['drugId'];
    $quantity = $drug['quantity'];
    $price_per_quantity = $drug['drugPrice'];

    // Computing the total price
    $total_price = $quantity*$price_per_quantity;

    // Storing data in an array
    $itemsData = [
      'invoice_id'=>$invoice_id,
      'drug_id'=>$drug_id,
      'quantity'=>$quantity,
      'total_price'=>$total_price
    ];

    $invoice_item->addInvoiceItem($itemsData);
  }

  // Relocate to dispense drugs page
  echo "Drugs dispensed successfully";
} else {

  // Invalid request method
  http_response_code(405);
  echo 'Invalid request method';
}

?>
