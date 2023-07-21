<?php
class SignInContr extends SignIn{
	private $user_name;
    private $user_pass;
	
	public function __construct($user_name, $user_pass){
		$this->user_name = $user_name;
        $this->user_pass = $user_pass;
    }
	
	public function SignInUser(){
		if($this->emptyInput() == false){
            session_start();
            $_SESSION['error'] = "empty input";
			header("location: ../../sign_in.php?error=emptyinput");
			exit();
		}
		
		$this->getUser($this->user_name, $this->user_pass);

        //Check registered details to redirect the user
        $this->checkRegisteredDetails();

	}

    private function emptyInput()
    {
        $check = null;
        if (empty($this->user_name)|| empty($this->user_pass))
        {
            $check = false;
        } else 
        {
            $check = true;
        }
        return $check;
    }

    private function checkRegisteredDetails() {
        //Open user menu (depending on user_type):
        if (isset($_SESSION["user_type"]) && isset($_SESSION['user_id'])) {
            $user_type = $_SESSION["user_type"];
            $user_id = $_SESSION["user_id"];
            $redirect_page = "";
            // switch-case block that sets the redirect page depending on the user type:
            switch ($user_type) {
                case "pharmacist":
                    $pharmacy = new Pharmacy();
                    $registered_fully = $pharmacy->checkColumn('user_id', 'tbl_pharmacy', $user_id);
                    if ($registered_fully) {
                        $redirect_page = "../../user_menu/pharmacy_menu.php";
                    } else {
                        $redirect_page = "../../register_details/pharmacy_details.php";
                    }
                    break;
                case "patient":
                    $patient = new Patient();
                    $registered_fully = $patient->checkColumn('user_id', 'tbl_patients', $user_id);
                    if ($registered_fully) {
                        $redirect_page = "../../user_menu/patient_menu.php";
                    } else {
                        $redirect_page = "../../register_details/patient_details.php";
                    }
                    break;
                case "doctor":
                    $doctor = new Doctor();
                    $registered_fully = $doctor->checkColumn('user_id', 'tbl_doctors', $user_id);
                    if ($registered_fully) {
                        $redirect_page = "../../user_menu/doctor_menu.php";
                    } else {
                        $redirect_page = "../../register_details/doctor_details.php";
                    }
                    break;
                case "supervisor":
                    $supervisor = new Supervisor();
                    $registered_fully = $supervisor->checkColumn('user_id', 'tbl_supervisors', $user_id);
                    if ($registered_fully) {
                        $redirect_page = "../../user_menu/supervisor_menu.php";
                    } else {
                        $redirect_page = "../../register_details/supervisor_details.php";
                    }
                    break;
                case "pharmaceutical_company":
                    $pharmaceutical = new Pharmaceutical();
                    $registered_fully = $pharmaceutical->checkColumn('user_id', 'tbl_pharmaceutical', $user_id);
                    if ($registered_fully) {
                        $redirect_page = "../../user_menu/pharmaceutical_company_menu.php";
                    } else {
                        $redirect_page = "../../register_details/pharmaceutical_details.php";
                    }
            }
            header("Location: " . $redirect_page . "?error=none");
        }
    }
    

    

}

?>