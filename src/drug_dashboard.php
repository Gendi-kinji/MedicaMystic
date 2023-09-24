<?php 
include 'inc/autoloader.inc.php';
require_once 'drug_display.php';


include  'common_sections/topbar.php';

?>
<head>
    <link rel="stylesheet" href="./styles/drug_dashboard.css"/>



<title><?php 
if(isset($_GET["category"])){
    $category = $_GET["category"];
    if($category=="painkillers"){
        $pageTitle="painkillers";
    }
    if($category=="antibiotics"){
        $pageTitle= "antibiotics";}
    if($category=="vaccines"){
        $pageTitle="vaccines";}
    if($category== "antidepressant"){
        $pageTitle= "antidepressant";}
    if($category== "antifungals"){
      $pageTitle= "antifungals";}
}

echo $pageTitle; ?></title>
    <nav>
        <ul>
            <li><a href="drug_dashboard.php?category=painkillers">Painkillers</a></li>
            <li><a href="drug_dashboard.php?category=antibiotics">Antibiotics</a></li>
            <li><a href="drug_dashboard.php?category=vaccines">Vaccines</a></li>
            <li><a href="drug_dashboard.php?category=antidepressant">Antidepressants</a></li>
            <li><a href="drug_dashboard.php?category=antifungals">Antifungals</a></li>

        </ul>
    </nav>
</head>
<body>
    <div class="detail">
        
       <?php 
         $drug=new Drug();
         $all=$drug->getAllDrugs();
         print_r($all);

         generateImage();

        
      
       ?>
       <a href="drug_details.php" >View Details</a>

   </div> 


    
</body>
</html>
