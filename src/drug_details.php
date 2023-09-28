<?php
include 'inc/autoloader.inc.php';
require_once 'drug_display.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $pageTitle='Drug Details';
        echo $pageTitle;
        ?>
    </title>
</head>
<body>
    <?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    generateImage($id);
$drug_detail=new Drug();

$drug_info=$drug_detail->getDrugByID($id);
foreach($drug_info as $drug=>$value){
    
    if(is_array($value)){
        foreach($value as $info=>$detail){
            echo "<div>";
            echo "<ul>";
            echo "<li>".$info."=".$detail."\n"."</li>";
            echo "</ul>";
            echo "</div>";
          
        }}
 
}

}
?>
</body>
</html>
