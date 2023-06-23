<?php
$id = $_GET['id'];

$pharmaceutical = new Pharmaceutical();
if($pharmaceutical->deletePharmaceutical($id) === TRUE){
    header("Location: ..view_tables/view_pharmaceutical.php?error=none");
}
else{
    header("Location: ..view_tables/view_pharmaceutical.php?error=deletefailed");
};
?>