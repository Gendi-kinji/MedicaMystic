<?php
class Pharmaceutical extends DatabaseHandler{
    public function __construct(){

    }

    public function addPharmaceutical($pharmaceuticalData){
        $this->setData('tbl_pharmaceutical', $pharmaceuticalData);
    }

    public function getPharmaceutical($search_value){
        return $this->getData('tbl_pharmaceutical', 'company_id', $search_value);
    }
    public function getPharmaceuticalByUserId($search_value){
        return $this->getData('tbl_pharmaceutical', 'user_id', $search_value);
    }
    public function getAllPharmaceuticals(){
        return $this->getTable('tbl_pharmaceutical');
    }

    public function updatePharmaceutical($pharmaceutical_data, $unique_value){
        $this->updateData('tbl_pharmaceutical', 'company_id', $pharmaceutical_data, $unique_value);
    }
    public function deletePharmaceutical($unique_value){
        $this->deleteData('tbl_pharmaceutical','company_id', $unique_value);
    }


}
?>