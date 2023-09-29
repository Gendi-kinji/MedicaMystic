<?php
include 'inc/autoloader.inc.php';

// Function that generates an image tag for an image
function generateImage($value)
{
  // Create a new instance of the Drug class
  $drug = new Drug();
  $image_row = $drug->getDrugImage($value);

  if (empty($image_row)) {
    // Return a default tag if image doesn't exist
    return '<img class="drug_images" src="http://localhost:3000/uploads/default.png" alt="Drug Image">';
  } else {
    // Define the base URL for image access
    $imageBaseUrl = "http://localhost:3000/";

    // Extract the first image URL from the array
    $imageURL = $image_row[0]['image'];

    // Return the image URL in form of an image tag
    $output = '<img class="drug_images" src="' . $imageBaseUrl . '/uploads/' . basename($imageURL) . '" alt="Drug Image">';
    return $output;
  }
}

?>