<?php
    if(isset($_POST["submit"]))
    {

        // Grab the data submitted by the user
        $admin_name = $_POST['admin_name'];
        $user_pass = $_POST['user_pass'];
        
        // Include important files:
        require "../classes/connection.class.php";
        require "../classes/databasehandler.class.php";
        require "../classes/models/admin-login.class.php";
        require "../classes/controllers/admin-login-contr.class.php";

        //Instantiate register controller:
        $sign_in = new AdminLoginContr($admin_name, $admin_pass);

        //Run error handler and user registration:
        $sign_in->SignInAdmin();

        //Open user menu (depending on user_type):
        header("Location:../admin_menu/dashboard.php?error=none");

    }
    

?>