<?php
class InvoiceItem extends DatabaseHandler{
    public function __construct(){
        
    }
    public function addInvoiceItem($itemsData) {
        return $this->setData('tbl_invoice_items', $itemsData);
    }
    public function getInvoiceItem($search_value){
        return $this->getData('tbl_invoice_items', 'invoice_item_id', $search_value);
    }

    public function getAllInvoiceItems(){
        return $this->getTable('tbl_invoice_items');
    }
    public function getInvoiceItemsByInvoiceId($search_value){
        return $this->getData('tbl_invoice_items','invoice_id', $search_value);
    }
    public function getIDs(){
        return $this->getColumn('invoice_item_id', 'tbl_invoice_items');
    }
    public function updateInvoiceItem($items_data, $unique_value){
        $this->updateData('tbl_invoice_items', 'invoice_item_id', $items_data, $unique_value);
    }
    public function deleteInvoiceItem($unique_value){
        $this->deleteData('tbl_invoice_items','invoice_item_id', $unique_value);

    }
}
?>