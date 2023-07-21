<?php
    if(isset($_POST["submit"]))
    {

        // Grab the data submitted by the user
        $user_name = $_POST['user_name'];
        $user_pass = $_POST['user_pass'];
        
        // Include important files:
        require "../classes/connection.class.php";
        require "../classes/databasehandler.class.php";
        require "../classes/models/signin.class.php";
        require "../classes/controllers/signin-contr.class.php";

        // User classes
        require "../classes/models/patient.class.php";
        require "../classes/models/doctor.class.php";
        require "../classes/models/pharmacy.class.php";
        require "../classes/models/pharmaceutical.class.php";
        require "../classes/models/supervisor.class.php";

        //Instantiate register controller:
        $sign_in = new SignInContr($user_name, $user_pass);

        //Run error handler and user sign-in:
        $sign_in->SignInUser();

    }
    

?>