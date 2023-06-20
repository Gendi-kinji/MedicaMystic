<?php
class Doctor extends DatabaseHandler{

    public function __construct(){

    }

    public function addDoctor($doctorData){
        $this->setData('tbl_doctors', $doctorData);
    }

    public function getDoctor($identifier){
        return $this->getData('tbl_doctors', $identifier);
    }

    public function getAllDoctors(){
        return $this->getTable('tbl_doctors');
    }

}
?>