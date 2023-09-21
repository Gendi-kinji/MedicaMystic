<?php

include 'inc/autoloader.inc.php';
$drug_detail = new Drug();
$drug_id = 1;
$drug_image = $drug_detail->getDrugImage($drug_id);
foreach ($drug_image as $image => $file) {
    if (is_array($file)) {
        print_r($file);
        foreach ($file as $upload => $value) {
          
            if ($upload== "image") {
                if(is_file($value)){
                echo "<img src=" . $value .">";
            }
            }
            echo "<p>" . $value . "</p>";
        }
    }
}
       
//}         


?>