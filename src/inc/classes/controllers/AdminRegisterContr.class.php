<?php
class AdminRegisterContr extends AdminRegister{
    private $admin_name;
    private $admin_email;
    private $admin_pass;
    private $admin_pass_confirm;

    public function __construct($admin_name, $admin_email, $admin_pass, $admin_pass_confirm){
        $this->admin_name = $admin_name;
        $this->admin_email = $admin_email;
        $this->admin_pass = $admin_pass;
        $this->admin_pass_confirm = $admin_pass_confirm;
    }

    public function registerAdmin(){
        // Check for vaidity of details:
         
        // Empty input:
        if($this->emptyInput()===false){
            header('location: ../../admin_register.php?error=emptyinput');
            exit();
        }
        if($this->invalidUsername()===false){
            header('location: ../../admin_register.php?error=invalidusername');
            exit();
        }
        if($this->invalidEmail()===false){
            header('location: ../../admin_register.php?error=invalidemail');
            exit();
        }
        if($this->passwordMatch()===false){
            header('location: ../../admin_register.php?error=passwordmismatch');
            exit();
        }
        if($this->usernameTakenCheck()===false){
            header('location: ../../admin_register.php?error=usernametaken');
            exit();
        }
        

        // Create an array having the verified details
        $adminData = [
            'admin_name'=> $this->admin_name,
            'admin_email'=>$this->admin_email,
            'admin_pass'=>$this->admin_pass
        ];

        // Finally add admin details to the db:
        $this->setAdmin($adminData);

    }

    // Functions that perform checks:
    private function emptyInput()
    {
        $check = null;
        if (
            empty($this->admin_name)
            || empty($this->admin_email)
            || empty($this->admin_pass)
            || empty($this->admin_pass_confirm)
        ) {
            $check = false;
        } else {
            $check = true;
        }
        return $check;
    }

    private function invalidUsername(){
        $check = null;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->admin_name))
			{
				$check = false;
			}
		else{
				$check = true;
			}
		return $check;
	}

    private function invalidEmail(){
        $check = null;
        if(!filter_var($this->admin_email, FILTER_VALIDATE_EMAIL))
			{
				$check = false;
			}
		else{
				$check = true;
			}
		return $check;
	}

    private function passwordMatch(){
        $check = null;
        if($this->admin_pass !== $this->admin_pass_confirm)
        {
            $check = false;
        }
        else{
            $check = true;
        }
        return $check;
    }

    private function usernameTakenCheck(){
        $check = null;
        if(!$this->checkAdmin($this->admin_name, $this->admin_email))
        {
            $check = false;
        }
        else{
            $check = true;
        }
        return $check;
    }



}

?>