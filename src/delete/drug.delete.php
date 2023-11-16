<?php
require_once "../inc/autoloader.inc.php";
require_once "../inc/img_url_generator.inc.php";

$id = $_GET['id'];

// Create a drug object
$drug = new Drug();

// Delete the drug from the database
$drug_deleted = $drug->deleteDrug($id);

// Get the image path and delete it locally from the uploads folder
$drug_image = $drug->getDrugImage($id);
$drug_image_path = generateImagePath($id);

print_r($drug_image_path);

$unlinked = false;
if (file_exists($drug_image_path)) {
    $unlinked = unlink($drug_image_path);
}

// Delete the image from the database
$image_deleted = $drug->deleteDrugImage($id);

// Check if the drug and image were deleted successfully
if($drug_deleted === TRUE && $image_deleted === TRUE && $unlinked === TRUE){
    header("Location: ../tables/editable/manage_drugs.php?error=none");
}
else{
    header("Location: ../tables/editable/manage_drugs.php?error=deletefailed");
};
?>