<?php
class Drug extends DatabaseHandler{

    public function __construct(){
        
    }

    public function addDrug($drugData){
        $this->setData('tbl_drugs', $drugData);
    }

    public function getDrug($identifier){
        return $this->getData('tbl_drugs', $identifier);
    }

    public function getAllDrugs(){
        return $this->getTable('tbl_drugs');
    }

}
?>