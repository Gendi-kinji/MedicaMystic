<?php
    if(isset($_POST["submit"]))
    {
        // Grab the data submitted by the user
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_type = $_POST['user_type'];
        $user_pass = $_POST['user_pass'];
        $user_pass_confirm = $_POST['user_pass_confirm'];

        // Include important files:
        require "../classes/connection.class.php";
        require "../classes/databasehandler.class.php";
        require "../classes/models/register.class.php";
        require "../classes/controllers/register-contr.class.php";

        //Instantiate register controller:
        $register = new RegisterContr($user_name, $user_email, $user_type, $user_pass, $user_pass_confirm);

        //Run error handler and user registration:
        $register->registerUser();

        //Go back to welcome page after registering successfully:
        header("location: ../welcome.php?error=none");

    }
    

?>