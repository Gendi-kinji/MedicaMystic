<?php
class SupervisorFormProcessor extends FormProcessor{
    public function checkAllFields($formData){
        $this->validateRequiredFields($formData);
        $this->validatePhoneNo($formData['supervisor_phone']);
    }
    public function insertData($data){
        $Supervisor = new Supervisor();
        $Supervisor->addSupervisor($data);
        return true;
    }
}
?>