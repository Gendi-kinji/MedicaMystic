<?php

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get JSON data from request body
  $json = file_get_contents('php://input');
  $drug_IDs = json_decode($json, true);

  // Validate data
  // ...

  // Insert data into database
  // ...

  // Send response
  echo 'Data inserted successfully';
} else {
  // Invalid request method
  http_response_code(405);
  echo 'Invalid request method';
}

?>
