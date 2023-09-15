<?php
    if(isset($_POST["submit"]))
    {
        // Grab the data submitted by the user
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_type = $_POST['user_type'];
        $user_pass = $_POST['user_pass'];
        $user_pass_confirm = $_POST['user_pass_confirm'];

        // Include important files
      
        require_once "../inc/autoloader.inc.php";


        //Instantiate register controller:
        $register = new RegisterContr($user_name, $user_email, $user_type, $user_pass, $user_pass_confirm);

        //Run error handler and user registration:
        $register->registerUser();

        // switch-case block that sets the redirect page depending on the user type:
            switch ($user_type) {
                case "pharmacist":
                    $redirect_page = "../register_details/pharmacy_details.php";
                    break;
                case "patient":
                    $redirect_page = "../register_details/patient_details.php";
                    break;
                case "doctor":
                    $redirect_page = "../register_details/doctor_details.php";
                    break;
                case "supervisor":
                    $redirect_page = "../register_details/supervisor_details.php";
                    break;
                case "pharmaceutical_company":
                    $redirect_page = "../register_details/pharmaceutical_details.php";
                }
                header("Location: ".$redirect_page."?error=none");

    }
    

?>