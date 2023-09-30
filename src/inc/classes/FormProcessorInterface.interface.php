<?php
interface FormProcessorInterface{
    // Abstract methods to be implemented by FormProcessor abstract class
    public function processForm($formData, $id, $action);
    public function validateEmail($email);
    public function validatePhoneNo($phone);
    public function validatePositiveNumber($value);
    public function validateImage();
    public function validateRequiredFields($formData);


}



?>