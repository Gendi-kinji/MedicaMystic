<?php
class Doctor extends DatabaseHandler{

    public function __construct(){

    }

    public function addDoctor($doctorData){
        $this->setData('tbl_doctors', $doctorData);
    }

    public function getDoctor($search_value){
        return $this->getData('tbl_doctors', 'doctor_ssn', $search_value);
    }

    public function getAllDoctors(){
        return $this->getTable('tbl_doctors');
    }

    public function updateDoctor($doctor_data, $unique_value){
        $this->updateData('tbl_doctors', 'doctor_ssn', $doctor_data, $unique_value);
    }
    public function deleteDoctor($unique_value){
        $this->deleteData('tbl_doctors','doctor_ssn', $unique_value);

    }

}
?>