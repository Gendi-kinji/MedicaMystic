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
            <li><a href="">Painkillers</a></li>
            <li><a href="">Antibiotics</a></li>
            <li><a href="">Vaccines</a></li>
            <li><a href="">Antidepressants</a></li>
            <li><a href="">Antifungals</a></li>

        </ul>
    </nav>
</head>
<body>
    <div class="detail">

    
       
       <a href="drug_details.php" >View Details</a>

   </div> 


    
</body>
</html>
