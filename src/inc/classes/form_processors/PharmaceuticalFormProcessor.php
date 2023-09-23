<?php
class PharmaceuticalFormProcessor extends FormProcessor{
    public function checkAllFields($formData){
        $this->validateRequiredFields($formData);
        $this->validatePhoneNo($formData['company_phone']);
    }
    public function insertData($data){
        $Pharmaceutical = new Pharmaceutical();
        $Pharmaceutical->addPharmaceutical($data);
        return true;
    }
}
?>