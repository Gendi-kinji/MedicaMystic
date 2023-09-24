<?php
include 'inc/autoloader.inc.php';
if(isset($_GET['category'])){
$drug_detail=new Drug();

$drug_info=$drug_detail->getAllDrugs();
foreach($drug_info as $drug=>$value){
    
    if(is_array($value)){
        foreach($value as $info=>$detail){
            echo "<p>".$info."=".$detail."\n"."</p>";
            if($info=="drug_id"){
                $drug_image=$drug_detail->getDrugImage($info);
                foreach($drug_image as $image=>$file){
                    echo "<ul>".$file."</ul>";
            }
        }}
 
}
if($drug_detail==null){
    echo "No drug specified";
}}}
?>