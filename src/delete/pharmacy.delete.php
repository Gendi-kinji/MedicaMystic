<?php
require_once "../inc/autoloader.inc.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $pharmacy = new Pharmacy();
    if($pharmacy->deletePharmacy($id) === TRUE){
        header("Location: ../tables/editable/manage_pharmacy.php?error=none");
    }
    else{
        header("Location: ../tables/editable/manage_pharmacy.php?error=deletefailed");
    };
}
?>