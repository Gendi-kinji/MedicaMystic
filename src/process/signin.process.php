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

        //Instantiate register controller:
        $sign_in = new SignInContr($user_name, $user_pass);

        //Run error handler and user registration:
        $sign_in->SignInUser();

        //Open user menu (depending on user_type):
        if(isset($_SESSION["user_type"])){
            $user_type = $_SESSION["user_type"];
            $redirect_page = "";
            // switch-case block that sets the redirect page depending on the user type:
            switch ($user_type) {
                case "pharmacist":
                    $redirect_page = "../user_menu/pharmacy_menu.php";
                    break;
                case "patient":
                    $redirect_page = "../user_menu/patient_menu.php";
                    break;
                case "doctor":
                    $redirect_page = "../user_menu/doctor_menu.php";
                    break;
                case "supervisor":
                    $redirect_page = "../user_menu/supervisor_menu.php";
                    break;
                case "pharmaceutical_company":
                    $redirect_page = "../user_menu/pharmaceutical_company_menu.php";
                }
                header("Location: ".$redirect_page."?error=none");
        }

    }
    

?>