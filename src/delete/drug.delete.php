<?php
require "../classes/connection.class.php";
require "../classes/databasehandler.class.php";
require "../classes/models/drug.class.php";

$id = $_GET['id'];

$drug = new Drug();
if($drug->deleteDrug($id) === TRUE){
    header("Location: ../view_tables/view_drugs.php?error=none");
}
else{
    header("Location: ../view_tables/view_drugs.php?error=deletefailed");
};
?>