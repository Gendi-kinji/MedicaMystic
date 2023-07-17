<?class Invoice extends DatabaseHandler{
    public function __construct(){
        
    }
    public function addInvoiceItem($itemsData) {
        $this->setData('tbl_invoice_items', $itemsData);
    }
    public function getInvoiceItem($search_value){
        return $this->getData('tbl_invoice_items', 'item_id', $search_value);
    }

    public function getAllInvoiceItems(){
        return $this->getTable('tbl_invoice_items');
    }
    public function getIDs(){
        return $this->getColumn('item_id', 'tbl_invoice_items');
    }
    public function updateInvoiceItem($items_data, $unique_value){
        $this->updateData('tbl_invoice_items', 'item_id', $items_data, $unique_value);
    }
    public function deleteInvoiceItem($unique_value){
        $this->deleteData('tbl_invoice_items','item_id', $unique_value);

    }
}
?>