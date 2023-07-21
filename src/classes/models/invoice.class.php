<?php
class Invoice extends DatabaseHandler{
    public function __construct(){
        
    }
    public function addInvoice($invoiceData, $return_insert_id = true) {
        return $this->setData('tbl_invoice', $invoiceData, $return_insert_id);
    }
    public function getInvoice($search_value){
        return $this->getData('tbl_invoice', 'invoice_id', $search_value);
    }

    public function getAllInvoices(){
        return $this->getTable('tbl_invoice');
    }
    public function getAllInvoiceDetails(){
        return $this->getTable('view_invoices');
    }
    public function getIDs(){
        return $this->getColumn('invoice_id', 'tbl_invoice');
    }
    public function updateInvoice($invoice_data, $unique_value){
        $this->updateData('tbl_invoice', 'invoice_id', $invoice_data, $unique_value);
    }
    public function deleteInvoice($unique_value){
        $this->deleteData('tbl_invoice','invoice_id', $unique_value);

    }
}
?>