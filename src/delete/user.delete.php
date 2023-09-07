<?php
require_once "../inc/autoloader.inc.php";

$id = $_GET['id'];

$user = new user();
if($user->deleteUsers($id) === TRUE){
    header("Location: ../tables/editable/manage_users.php?error=none");
}
else{
    header("Location: ../tables/editable/manage_users.php?error=deletefailed");
};
?>