<?php
class Supervisor extends DatabaseHandler{
    public function __construct(){

    }

    public function addSupervisor($supervisorData){
        $this->setData('tbl_supervisors', $supervisorData);
    }

    public function getSupervisor($identifier){
        return $this->getData('tbl_supervisors', $identifier);
    }

    public function getAllSupervisors(){
        return $this->getTable('tbl_supervisors');
    }

    
}
?>