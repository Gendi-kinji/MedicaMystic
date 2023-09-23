<?php
class PatientFormProcessor extends FormProcessor{
    public function checkAllFields($formData){
        $this->validateRequiredFields($formData);
        $this->validateEmail($formData['patient_email']);
        $this->validatePhoneNo($formData['patient_phone']);
    }
    public function insertData($data){
        $Patient = new Patient();
        $Patient->addPatient($data);
        return true;
    }
}
?>