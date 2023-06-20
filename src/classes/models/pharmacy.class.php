<?php
class Pharmacy extends DatabaseHandler{
    public function __construct(){

    }

    public function addPharmacy($pharmacyData){
        $this->setData('tbl_pharmacy', $pharmacyData);
    }

    public function getPharmacy($identifier){
        return $this->getData('tbl_pharmacy', $identifier);
    }

    public function getAllPharmacies(){
        return $this->getTable('tbl_pharmacy');
    }

}
?>