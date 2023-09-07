<?php
    if(isset($_POST["submit"]))
    {

        // Grab the data submitted by the user
        $user_name = $_POST['user_name'];
        $user_pass = $_POST['user_pass'];
        
        // Include important files:
        require_once "../inc/autoloader.inc.php";

        //Instantiate register controller:
        $sign_in = new SignInContr($user_name, $user_pass);

        //Run error handler and user sign-in:
        $sign_in->SignInUser();

    }
    

?>