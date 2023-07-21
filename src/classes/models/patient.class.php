<?php
class Patient extends DatabaseHandler{
    public function __construct(){
    
    }

    public function addPatient($patientData) {
        $this->setData('tbl_patients', $patientData);
    }

    public function getPatient($search_value){
        return $this->getData('tbl_patients', 'patient_ssn', $search_value);
    }
    public function getAllPatients(){
        return $this->getTable('tbl_patients');
    }

    public function getSSNs(){
        return $this->getColumn('patient_ssn', 'tbl_patients');
    }

    public function updatePatient($patient_data, $unique_value){
        $this->updateData('tbl_patients', 'patient_ssn', $patient_data, $unique_value);
    }
    public function deletePatient($unique_value){
        $this->deleteData('tbl_patients','patient_ssn', $unique_value);

    }

}
?>