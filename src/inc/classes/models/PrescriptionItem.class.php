<?php
class PrescriptionItem extends DatabaseHandler{
    public function __construct(){
        
    }
    public function addPrescriptionItem($itemsData) {
        return $this->setData('tbl_prescription_items', $itemsData);
    }
    public function getPrescriptionItem($search_value){
        return $this->getData('tbl_prescription_items', 'presc_item_id', $search_value);
    }
    public function getPrescQuantity($search_value){
        return $this->getColumnValue('presc_quantity', 'tbl_prescription_items', 'presc_item_id', $search_value);
    }
    public function getPrescriptionItemsByPrescId($search_value){
        return $this->getData('tbl_prescription_items','prescription_id', $search_value);
    }
    public function getAllPrescriptionItems(){
        return $this->getTable('tbl_prescription_items');
    }
    public function getIDs(){
        return $this->getColumn('presc_item_id', 'tbl_prescription_items');
    }
    public function updatePrescriptionItem($items_data, $unique_value){
        $this->updateData('tbl_prescription_items', 'presc_item_id', $items_data, $unique_value);
    }
    public function deleteprescriptionItem($unique_value){
        $this->deleteData('tbl_prescription_items','presc_item_id', $unique_value);
    }
}
?>