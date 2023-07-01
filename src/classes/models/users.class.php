<?php

class Users extends DatabaseHandler{
    public function __construct(){

    }
    public function addUsers($userData){
        return $this->setData('tbl_users',$userData);
    }
    public function getUsers($search_value){
        return $this->getData('tbl_users','user_name',$search_value);
    }
    public function getAllUsers(){
        return $this->getTable('tbl_users');
    }
    public function updateUsers($user_data,$unique_value){
        return $this->updateData('tbl_users','user_name',$user_data,$unique_value);
    }
    public function deleteUsers($unique_value){
        return $this->deleteData('tbl_users','user_name',$unique_value);
    }
}
?>