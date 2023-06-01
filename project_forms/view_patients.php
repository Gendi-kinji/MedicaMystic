<?php
require_once("database_classes/drug_database.php");
$sql = "SELECT * FROM tbl_patients";
$db->readTable($sql);
?>