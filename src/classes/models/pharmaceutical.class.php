<?php
class Pharmaceutical extends DatabaseHandler{
    public function __construct(){

    }

    public function addPharmaceutical($pharmaceuticalData){
        $this->setData('tbl_pharmaceutical', $pharmaceuticalData);
    }

    public function getPharmaceutical($identifier){
        return $this->getData('tbl_pharmaceutical', $identifier);
    }

    public function getAllPharmaceuticals(){
        return $this->getTable('tbl_pharmaceutical');
    }
}
?>