<?php
class PharmacyFormProcessor extends FormProcessor{
    public function checkAllFields($formData){
        $this->validateRequiredFields($formData);
        $this->validatePhoneNo($formData['pharmacy_phone']);
    }
    public function insertData($data){
        $Pharmacy = new Pharmacy();
        $Pharmacy->addPharmacy($data);
        return true;
    }
}
?>