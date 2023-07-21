<?php

require "../classes/connection.class.php";
require "../classes/databasehandler.class.php";
require "../classes/models/user.class.php";

$id = $_GET['id'];

$user = new user();
if($user->deleteUsers($id) === TRUE){
    header("Location: ../tables/editable/manage_users.php?error=none");
}
else{
    header("Location: ../tables/editable/manage_users.php?error=deletefailed");
};
?>