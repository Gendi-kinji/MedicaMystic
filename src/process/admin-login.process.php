<?php
    if(isset($_POST["submit"]))
    {

        // Grab the data submitted by the user
        $admin_name = $_POST['admin_name'];
        $admin_pass = $_POST['admin_pass'];
        
        // Include important files:
        require_once "../inc/autoloader.inc.php";
    
        //Instantiate register controller:
        $sign_in = new AdminLoginContr($admin_name, $admin_pass);

        //Run error handler and user registration:
        $sign_in->SignInAdmin();

        //Open user menu (depending on user_type):
        header("Location:../admin_menu/dashboard.php?error=none");

    }
    

?>