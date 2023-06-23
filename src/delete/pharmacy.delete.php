<?php
$id = $_GET['id'];

$pharmacy = new Pharmacy();
if($pharmacy->deletePharmacy($id) === TRUE){
    header("Location: ..view_tables/view_pharmacy.php?error=none");
}
else{
    header("Location: ..view_tables/view_pharmacy.php?error=deletefailed");
};
?>