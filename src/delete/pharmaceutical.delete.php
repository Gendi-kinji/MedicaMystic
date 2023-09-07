<?php
require_once "../inc/autoloader.inc.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $pharmaceutical = new Pharmaceutical();
    if($pharmaceutical->deletePharmaceutical($id) === TRUE){
        header("Location: ../tables/editable/manage_pharmaceutical.php?error=none");
    }
    else{
        header("Location: ../tables/editable/manage_pharmaceutical.php?error=deletefailed");
    }
}

?>