<?php
class Drug extends DatabaseHandler{

    public function __construct(){
        
    }

    public function addDrug($drugData){
        $this->setData('tbl_drugs', $drugData);
    }

    public function getDrug($search_value){
        return $this->getData('tbl_drugs', 'drug_id', $search_value);
    }

    public function getAllDrugs(){
        return $this->getTable('tbl_drugs');
    }

    public function updateDrug($drug_data, $unique_value){
        $this->updateData('tbl_drugs', 'drug_id', $drug_data, $unique_value);
    }
    public function deleteDrug($unique_value){
        $this->deleteData('tbl_drugs','drug_id', $unique_value);

    }

}
?>