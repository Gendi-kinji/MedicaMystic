<?php 
include 'inc/autoloader.inc.php';
require_once 'drug_display.php';
include 'common_sections/topbar.php';

?>
<head>
    <link rel="stylesheet" href="./styles/drug_dashboard.css"/>

    <title><?php 
    $pageTitle = "Drug Dashboard"; // Default title
    if(isset($_GET["category"])){
        $category = $_GET["category"];
        if($category=="painkillers"){
            $pageTitle="Painkillers";
        }
        if($category=="antibiotics"){
            $pageTitle= "Antibiotics";
        }
        if($category=="vaccines"){
            $pageTitle="Vaccines";
        }
        if($category== "antidepressant"){
            $pageTitle= "Antidepressants";
        }
        if($category== "antifungals"){
            $pageTitle= "Antifungals";
        }
    }
    echo $pageTitle;
    ?></title>
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
       if (isset($_GET["category"])) {
           
            $drug = new Drug();
            $data = $drug->getDrugByCategory($category);
           
            foreach($data as $key=>$value) {
                if(is_array($value)) {
                    foreach($value as $key2=>$value2) {
                       if($key2=="drug_id"){
                         generateImage($value2);
                         echo "<a href=drug_details.php?id=".$value2.">"."View details"."</a>";
                       }

                    }}}
            //if ($data!=null) {
                echo "<ul>";
               // foreach ($data as $item=>$value) {
                  /*  if(is_array($value)) {
                        foreach($value as $drug=>$type){
                    echo "<li>" . $drug .$type. "</li>";
                }
                echo "</ul>";
            } else {
                echo "No drugs found in this category.";
            }}
        }}//*/}
        ?>
        
    </div>
</body>
</html>
