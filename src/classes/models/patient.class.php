<?php
class Patient extends DatabaseHandler{
    public function __construct(){
    
    }

    public function addPatient($patientData) {
        $this->setData('tbl_patients', $patientData);
    }

    public function getPatient($identifier){
        return $this->getData('tbl_patients', $identifier);
    }

    public function getAllPatients(){
        return $this->getTable('tbl_patients');
    }

}
?>