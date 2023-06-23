<?php
$id = $_GET['id'];

$supervisor = new Supervisor();
if($supervisor->deleteSupervisor($id) === TRUE){
    header("Location: ..view_tables/view_supervisors.php?error=none");
}
else{
    header("Location: ..view_tables/view_supervisors.php?error=deletefailed");
};
?>