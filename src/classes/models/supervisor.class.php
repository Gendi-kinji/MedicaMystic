<?php
class Supervisor extends DatabaseHandler{
    public function __construct(){

    }

    public function addSupervisor($supervisorData){
        $this->setData('tbl_supervisors', $supervisorData);
    }

    public function getSupervisor($search_value){
        return $this->getData('tbl_supervisors', 'supervisor_id', $search_value);
    }
    public function getSupervisorByUserId($search_value){
        return $this->getData('tbl_pharmacy', 'user_id', $search_value);
    }
    public function getAllSupervisors(){
        return $this->getTable('tbl_supervisors');
    }

    public function updateSupervisor($supervisor_data, $unique_value){
        $this->updateData('tbl_supervisors', 'supervisor_id', $supervisor_data, $unique_value);
    }
    public function deleteSupervisor($unique_value){
        $this->deleteData('tbl_supervisors','supervisor_id', $unique_value);

    }

    
}
?>