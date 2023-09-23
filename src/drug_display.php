<?php
include 'inc/autoloader.inc.php';

$drug_detail = new Drug();
$drug_id = $drug_detail->getIDS();
print_r($drug_id);
foreach($drug_id as $id=>$info){
  if(is_array($info)){
    foreach($info as $key=>$value){
// Assuming $drug_detail->getDrugImage($drug_id) returns an array of image URLs
$drug_image = $drug_detail->getDrugImage($value);

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
    echo "<ul> " .  $file. "</ul>";}
    }}}}}}
?>
