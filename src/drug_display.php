<?php
include 'inc/autoloader.inc.php';

$drug_detail = new Drug();
$drug_id = 1;

// Assuming $drug_detail->getDrugImage($drug_id) returns an array of image URLs
$drug_image = $drug_detail->getDrugImage($drug_id);

// Define the base URL for image access
$imageBaseUrl = "http://localhost:3000/";
$urlate=[];

// Loop through the image URLs and display them
foreach ($drug_image as $image) {
    if(is_array($image)) {
        foreach($image as $url=>$file){
            if($url=="image"){
              $urlate=$file;
              
              echo '<img src="' . $imageBaseUrl .'/uploads/'.basename($urlate) . '" alt="Drug Image">';}
            else{
    echo "<p> " .  $file. "</p>";}
    }}}
?>
