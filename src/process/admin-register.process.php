<?php
    if(isset($_POST["submit"]))
    {
        // Grab the data submitted
        $admin_name = $_POST['admin_name'];
        $admin_email = $_POST['admin_email'];
        $admin_pass = $_POST['admin_pass'];
        $admin_pass_confirm = $_POST['admin_pass_confirm'];

        // Include important files:
        require_once "../inc/autoloader.inc.php";
        
        //Instantiate admin controller:
        $admin = new AdminRegisterContr($admin_name, $admin_email, $admin_pass, $admin_pass_confirm);

        //Run error handler and admin registration:
        $admin->registerAdmin();

        //Go back to admin login page after registering successfully:
        header("location: ../admin_login.php?error=none");

    }
    

?>