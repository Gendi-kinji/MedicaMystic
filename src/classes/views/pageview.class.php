<?php
class PageView {
    public static function Pagination($totalItems, $itemsPerPage = 10, $currentPage) {
        $totalPages = ceil($totalItems / $itemsPerPage);
        $startPage = max(1, $currentPage - 2);
        $endPage = min($totalPages, $currentPage + 2);
        return range($startPage, $endPage);
    }

    public static function showPatientDetails(){
        $patient = new patient();

            // Check if the search form was submitted
            if (isset($_GET['ssn'])) {
                // Get the search criteria from the form
                $ssn = $_GET['ssn'];

                // Filter the data based on the search criteria
                $patient_table = $patient->getPatient($ssn);
                if(count($patient_table)==0){
                    echo "No record found";
                } else{
                    // Display the patient details in a div
                    echo '<div class="patient-details">';
                    foreach ($patient_table[0] as $key => $value) {
                        echo "<span>$key: $value</span><br>";
                    }
                    echo '</div><br>';
                }
            } else {
                // Get all patients
                $patient_table = $patient->getAllpatients();
            }
            return $patient_table;
    }
}
?>