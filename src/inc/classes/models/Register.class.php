<?php
class Register extends DatabaseHandler{
    protected function setUser($userData){
        // Hashing the password sent by user:
        $hashed_pass = password_hash($userData['user_pass'], PASSWORD_DEFAULT);
        
        // Inserting the details and the hashed_pass:
        $userData['user_pass'] = $hashed_pass;
        $user_id = $this->setData('tbl_users', $userData, true);

        session_start();
        $_SESSION['user_id'] = $user_id;
    }

    protected function checkUser($user_name, $user_email){
        $sql = "SELECT user_name FROM tbl_users WHERE user_name = ? OR user_email = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $user_name, $user_email);

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../../register.php?error=selectstmtfailed");
            exit();
        }

        $result_check = null;

        //Check if user_name or user_email exists:
        if($stmt->get_result()->num_rows>0){
            $result_check = false;
        }
        else{
            $result_check =  true;
        }
        return $result_check;
    }

}
?>