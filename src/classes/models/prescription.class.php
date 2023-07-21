<?php
class Prescription extends DatabaseHandler{
    public function __construct(){
        
    }
    public function addPrescription($prescriptionData, $return_insert_id = true) {
        return $this->setData('tbl_prescriptions', $prescriptionData, $return_insert_id);
    }
    public function getPrescription($search_value){
        return $this->getData('tbl_prescriptions', 'prescription_id', $search_value);
    }

    public function getAllPrescriptions(){
        return $this->getTable('tbl_prescriptions');
    }
    public function getAllPrescriptionDetails(){
        return $this->getTable('tbl_prescription_items');
    }
    public function getIDs(){
        return $this->getColumn('prescription_id', 'tbl_prescriptions');
    }
    public function updatePrescription($Prescription_data, $unique_value){
        $this->updateData('tbl_prescriptions', 'prescription_id', $Prescription_data, $unique_value);
    }
    public function deletePrescription($unique_value){
        $this->deleteData('tbl_prescriptions','prescription_id', $unique_value);

    }
}
?>