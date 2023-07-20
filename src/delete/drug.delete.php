<?php
require "../classes/connection.class.php";
require "../classes/databasehandler.class.php";
require "../classes/models/drug.class.php";

$id = $_GET['id'];

$drug = new Drug();
if($drug->deleteDrug($id) === TRUE){
    header("Location: ../tables/editable/manage_drugs.php?error=none");
}
else{
    header("Location: ../tables/editable/manage_drugs.php?error=deletefailed");
};
?>