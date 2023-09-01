<?php
require "../classes/connection.class.php";
require "../classes/databasehandler.class.php";
require "../classes/models/supervisor.class.php";

$id = $_GET['id'];
if(isset($_GET['id'])){
    $supervisor = new Supervisor();
    if($supervisor->deleteSupervisor($id) === TRUE){
        header("Location: ../tables/editable/manage_supervisors.php?error=none");
    }
    else{
        header("Location: ../tables/editable/manage_supervisors.php?error=deletefailed");
    };
}

?>