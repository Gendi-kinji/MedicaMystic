<?php

class Drug extends DatabaseHandler{

    public function __construct(){
        
    }

    public function addDrug($drugData, $return_insert_id = true){
        return $this->setData('tbl_drugs', $drugData, $return_insert_id);
    }

    public function getDrugByID($search_value){
        return $this->getData('tbl_drugs', 'drug_id', $search_value);
    }
    public function getDrugByTradeName($search_value){
        return $this->getData('tbl_drugs', 'trade_name', $search_value);
    }

    public function getAllDrugs(){
        return $this->getTable('tbl_drugs');
    }
    public function getIDs(){
        return $this->getColumn('drug_id', 'tbl_drugs');
    }
    public function getTradeNames(){
        return $this->getColumn('trade_name', 'tbl_drugs');
    }

    public function updateDrug($drug_data, $unique_value){
        return $this->updateData('tbl_drugs', 'drug_id', $drug_data, $unique_value);
    }
    public function deleteDrug($unique_value){
        return $this->deleteData('tbl_drugs','drug_id', $unique_value);

    }
    public function addDrugImage($image_data){
        return $this->setData('tbl_drug_images', $image_data);
    }
    public function updateDrugImage($image_data, $unique_value){
        return $this->updateData('tbl_drug_images', 'drug_id', $image_data, $unique_value);
    }
    public function getDrugImage($search_value){
        return $this->getData('tbl_drug_images', 'drug_id', $search_value);
    }
    public function getDrugsByCategory($search_value){
        return $this->getData('tbl_drugs', 'drug_category', $search_value);
    }
    public function deleteDrugImage($unique_value){
        return $this->deleteData('tbl_drug_images','drug_id', $unique_value);
    }
}
?>