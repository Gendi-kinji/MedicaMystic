<?php
class Pharmacy extends DatabaseHandler{
    public function __construct(){

    }

    public function addPharmacy($pharmacyData){
        $this->setData('tbl_pharmacy', $pharmacyData);
    }

    public function getPharmacy($search_value){
        return $this->getData('tbl_pharmacy', 'pharmacy_id', $search_value);
    }

    public function getAllPharmacies(){
        return $this->getTable('tbl_pharmacy');
    }

    public function updatePharmacy($pharmacy_data, $unique_value){
        $this->updateData('tbl_pharmacy', 'pharmacy_id', $pharmacy_data, $unique_value);
    }
    public function deletePharmacy($unique_value){
        $this->deleteData('tbl_pharmacy','pharmacy_id', $unique_value);

    }

}
?>