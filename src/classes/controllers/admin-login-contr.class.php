<?php
class AdminLoginContr extends AdminLogin{
    private $admin_name;
    private $admin_pass;
	
	public function __construct($admin_name, $admin_pass){
		$this->admin_name = $admin_name;
        $this->admin_pass = $admin_pass;
    }
	
	public function SignInAdmin(){
		if($this->emptyInput() == false){
			header("location: ../../admin_login.php?error=emptyinput");
			exit();
		}
		
		$this->getAdmin($this->admin_name, $this->admin_pass);
	}

    private function emptyInput()
    {
        $check = null;
        if (empty($this->admin_name)|| empty($this->admin_pass))
        {
            $check = false;
        } else 
        {
            $check = true;
        }
        return $check;
    }
}?>