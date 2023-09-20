<?php
include 'inc/autoloader.inc.php';
$drug_detail=new Drug();
$drug_info=$drug_detail->getAllDrugs();
foreach($drug_info as $drug=>$value){
    
    if(is_array($value)){
        foreach($value as $info=>$detail){
            echo "<p>".$info."=".$detail."\n"."</p>";
        }}
 
}
if($drug_detail==null){
    echo "No drug specified";
}
?>