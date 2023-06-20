<?php
class RegisterContr extends Register
{
    private $user_name;
    private $user_email;
    private $user_type;
    private $user_pass;
    private $user_pass_confirm;

    public function __construct($user_name, $user_email, $user_type, $user_pass, $user_pass_confirm)
    {
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_type = $user_type;
        $this->user_pass = $user_pass;
        $this->user_pass_confirm = $user_pass_confirm;
    }


    // Check for any errors before submitting details to the database:
    public function registerUser()
    {
        //Empty input
        if($this->emptyInput() === false){
            header("location: ../../register.php?error=emptyinput");
            exit();
        }

        //Invalid username
        if($this->invalidUsername() === false){
            header("location: ../../register.php?error=invalidusername");
            exit();
        }

        //Invalid email
        if($this->invalidEmail() === false){
            header("location: ../../register.php?error=invalidemail");
            exit();
        }

        //Passwords don't match
        if($this->passwordMatch() === false){
            header("location: ../../register.php?error=passwordmatchfailed");
            exit();
        }

        //Username taken
        if($this->usernameTakenCheck() === false){
            header("location: ../../register.php?error=usernametaken");
            exit();
        }

        //After performing checks, add the user's details:
            $userData = array(
                'user_name'=>$this->user_name,
                'user_email'=>$this->user_email,
                'user_type'=>$this->user_type,
                'user_pass'=>$this->user_pass,
            );

            $this->setUser($userData);
    }

    //Empty input:
    private function emptyInput()
    {
        $check = null;
        if (
            empty($this->user_name)
            || empty($this->user_email)
            || empty($this->user_type)
            || empty($this->user_pass)
            || empty($this->user_pass_confirm)
        ) {
            $check = false;
        } else {
            $check = true;
        }
        return $check;
    }

    private function invalidUsername(){
        $check = null;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->user_name))
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
        if(!filter_var($this->user_email, FILTER_VALIDATE_EMAIL))
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
        if($this->user_pass !== $this->user_pass_confirm)
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
        if(!$this->checkUser($this->user_name, $this->user_email))
        {
            $check = false;
        }
        else{
            $check = true;
        }
        return $check;
    }

}
