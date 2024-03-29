<?php
class SignIn extends DatabaseHandler{
    protected function getUser($user_name, $user_pass){
        $sql = "SELECT user_pass FROM tbl_users WHERE user_name = ? OR user_email = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user_name, $user_name);
        if(!$stmt->execute()){
            $stmt = null;
            session_start();
            $_SESSION['error'] = 'Statement failed';
            header('Location: ../../sign_in.php');
            exit();
        }

        $result = $stmt->get_result();
        
        //Check the result:
        if($result->num_rows==0){
            $stmt = null;
            session_start();
            $_SESSION['error'] = 'User not found';
            header("location: ../../sign_in.php");
            exit();
        }

        $pwdHashed = $result->fetch_all(MYSQLI_ASSOC);
		$checkPwd = password_verify($user_pass, $pwdHashed[0]["user_pass"]);

        if($checkPwd == false){
            $stmt = null;
            session_start();
            $_SESSION['error'] = 'Incorrect password';
            header("location: ../../sign_in.php");
            exit();
        }
        elseif($checkPwd == true){
            $sql = "SELECT * FROM tbl_users WHERE (user_name = ? OR user_email = ?) AND user_pass=?";
            $conn = $this->connect();
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $user_name, $user_name, $pwdHashed[0]["user_pass"]);

            if(!$stmt->execute()){
                $stmt = null;
                session_start(); // delete the statement
                $_SESSION['error'] = 'Statement failed';
                header("Location: ../../sign_in.php"); // send back to page
                exit(); // leave the script
            }
		}

        $result = $stmt->get_result();
        $user = $result->fetch_all(MYSQLI_ASSOC);

        //Check the result:
        if($result->num_rows==0){
            $stmt = null;
            session_start();
            $_SESSION['error'] = 'User not found';
            header("location: ../../sign_in.php");
            exit();
        }

        session_start();
		$_SESSION["user_id"] = $user[0]["user_id"];
		$_SESSION["user_name"] = $user[0]["user_name"];
        $_SESSION["user_type"] = $user[0]["user_type"];
    }
}
?>
