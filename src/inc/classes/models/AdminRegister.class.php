<?php
class AdminRegister extends DatabaseHandler{
    protected function setAdmin($adminData){
        // Hashing the password set:
        $hashed_pass = password_hash($adminData['admin_pass'], PASSWORD_DEFAULT);
        
        // Inserting the details and the hashed_pass:
        $adminData['admin_pass'] = $hashed_pass;
        $this->setData('tbl_admins', $adminData);
    }

    protected function checkAdmin($admin_name, $admin_email){
        $sql = "SELECT admin_name FROM tbl_admins WHERE admin_name = ? OR admin_email = ?";
        $conn = $this->connect();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $admin_name, $admin_email);

        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../../admin_register.php?error=selectstmtfailed");
            exit();
        }

        $result_check = null;

        //Check if admin_name or admin_email exists:
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