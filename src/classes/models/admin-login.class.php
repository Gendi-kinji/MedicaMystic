<?php
class AdminLogin extends DatabaseHandler{
    protected function getadmin($admin_name, $admin_pass){
        $sql = "SELECT admin_pass FROM tbl_admins WHERE admin_name = ? OR admin_email = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $admin_name, $admin_name);
        if(!$stmt->execute()){
            $stmt = null;
            header('Location: ../../admin_login.php?error=stmtfailed');
            exit();
        }

        $result = $stmt->get_result();
        
        //Check the result:
        if($result->num_rows==0){
            $stmt = null;
            header("location: ../../admin_login.php?error=adminnotfound");
            exit();
        }

        $pwdHashed = $result->fetch_all(MYSQLI_ASSOC);
		$checkPwd = password_verify($admin_pass, $pwdHashed[0]["admin_pass"]);

        if($checkPwd == false){
            $stmt = null;
            header("location: ../../admin_login.php?error=incorrectpassword");
            exit();
        }
        elseif($checkPwd == true){
            $sql = "SELECT * FROM tbl_admins WHERE (admin_name = ? OR admin_email = ?) AND admin_pass=?";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $admin_name, $admin_name, $pwdHashed[0]["admin_pass"]);

            if(!$stmt->execute()){
                $stmt = null; // delete the statement
                header("Location: ../../admin_login.php?error=stmtfailed"); // send back to page
                exit(); // leave the script
            }
		}

        $result = $stmt->get_result();
        $admin = $result->fetch_all(MYSQLI_ASSOC);

        //Check the result:
        if($result->num_rows==0){
            $stmt = null;
            header("location: ../../admin_login.php?error=adminnotfound");
            exit();
        }

        session_start();
		$_SESSION["admin_id"] = $admin[0]["admin_id"];
		$_SESSION["admin_name"] = $admin[0]["admin_name"];

    }
}
?>