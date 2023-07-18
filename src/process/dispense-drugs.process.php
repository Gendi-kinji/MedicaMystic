<?php

require '../classes/connection.class.php';
require '../classes/databasehandler.class.php';
require '../classes/models/invoice.class.php';
require '../classes/models/invoice-item.class.php';

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get JSON data from request body
  $json = file_get_contents('php://input');
  $drug_IDs = json_decode($json, true);

  // Details for invoice
  $patient_ssn = "";

  // Instantiate objects of the invoice and invoice_items class
  $invoice = new Invoice();
  $invoice_item = new InvoiceItem();

  // Insert invoice data into database
  $invoice_id = $invoice->addInvoice($patient_ssn);

  //Computing the total price
  

  // Details for invoice items
  $itemsData = [
    'invoice_id'=>$invoice_id,
    'quantity'=>$quantity,
    'total_price'=>$total_price
  ];

  // Loop through each drug_id sent in the array and add records
  foreach($drug_IDs as $drug_id){
    array_push($itemsData, array('drug_id'=>$drug_id));
    $invoice_item->addInvoiceItem($itemsData);
    unset($invoiceData['drug_id']);
  }


  // Send response
  echo 'Data inserted successfully';
} else {
  // Invalid request method
  http_response_code(405);
  echo 'Invalid request method';
}

?>
