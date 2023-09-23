<?php 
include 'inc/autoloader.inc.php';

include  'common_sections/topbar.php';

?>
<head>
    <link rel="stylesheet" href="./styles/drug_dashboard.css"/>



<title><?php 
$pageTitle="Drug Dashboard";
echo $pageTitle; ?></title>
    <nav>
        <ul>
            <li><a href="drug_details.php?category=painkillers">Painkillers</a></li>
            <li><a href="drug_details.php?category=antibiotics">Antibiotics</a></li>
            <li><a href="drug_details.php?category=vaccines">Vaccines</a></li>
            <li><a href="drug_details.php?category=antidepressant">Antidepressants</a></li>
            <li><a href="drug_details.php?category=antifungals">Antifungals</a></li>

        </ul>
    </nav>
</head>
<body>
    <div class="detail">

    
       
       <a href="drug_details.php" >View Details</a>

   </div> 


    
</body>
</html>
