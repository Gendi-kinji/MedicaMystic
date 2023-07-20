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

    

}

?>