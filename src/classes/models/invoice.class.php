<?

// Get ID of new invoice
$invoiceId = $mysqli->insert_id;

// Loop through Drug IDs and insert rows into invoice_items table
foreach ($drugIds as $drugId) {
  $stmt = $mysqli->prepare('INSERT INTO invoice_items (invoice_id, drug_id) VALUES (?, ?)');
  $stmt->bind_param('ii', $invoiceId, $drugId);
  $stmt->execute();
}

class Invoice extends DatabaseHandler{

    public function __construct(){
        
    }
    public function addInvoice($patient_ssn) {
        $this->setData('tbl_invoice', $patient_ssn);
    }
    public function getInvoice($search_value){
        return $this->getData('tbl_invoice', 'invoice_s=id', $search_value);
    }

    public function getAllInvoices(){
        return $this->getTable('tbl_invoice');
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