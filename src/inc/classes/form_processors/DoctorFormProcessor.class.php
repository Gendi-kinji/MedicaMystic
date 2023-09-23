<?php
class DoctorFormProcessor extends FormProcessor{
    public function checkAllFields($formData){
        $this->validateRequiredFields($formData);
        $this->validateEmail($formData['doctor_email']);
        $this->validatePhoneNo($formData['doctor_phone']);
        $this->validatePositiveNumber($formData['years_of_exp']);
    }
    public function insertData($data){
        $doctor = new Doctor();
        $doctor->addDoctor($data);
        return true;
    }
}
?>