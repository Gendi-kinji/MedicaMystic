<?php
require "../classes/connection.class.php";
require "../classes/databasehandler.class.php";
require "../classes/models/supervisor.class.php";

$id = $_GET['id'];

$supervisor = new Supervisor();
if($supervisor->deleteSupervisor($id) === TRUE){
    header("Location: ..view_tables/view_supervisors.php?error=none");
}
else{
    header("Location: ..view_tables/view_supervisors.php?error=deletefailed");
};
?>