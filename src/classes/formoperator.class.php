<?php
Class FormOperator{

    public static function processDoctorForm(){
        session_start();
        // Initialize an empty array to hold error messages
        $errors = [];

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            // Check if any of the fields are blank
            if (empty($_POST['doctor_firstname']) || empty($_POST['doctor_surname']) || empty($_POST['doctor_dob']) || empty($_POST['doctor_address']) || empty($_POST['doctor_email']) || empty($_POST['years_of_exp']) || empty($_POST['doctor_phone'])) {
                $errors[] = "All fields are required.";
            }

            // Check if the email is in a valid format
            if (!filter_var($_POST['doctor_email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }

            // Check if the phone number is in a valid format
            if (!preg_match("/^\+\d{1,3}\d{3,14}$/", $_POST['doctor_phone'])) {
                $errors[] = "Invalid phone number format. Phone number must start with a '+' followed by the country code and phone number.";
            }

            // Check if there are any errors
            if (empty($errors)) {
                // No errors, add the data to the doctorData array
                $doctorData = [
                    'doctor_firstname' => $_POST['doctor_firstname'],
                    'doctor_surname' => $_POST['doctor_surname'],
                    'doctor_dob' => $_POST['doctor_dob'],
                    'doctor_address' => $_POST['doctor_address'],
                    'doctor_email' => $_POST['doctor_email'],
                    'years_of_exp' => $_POST['years_of_exp'],
                    'doctor_phone' => $_POST['doctor_phone']
                ];

                // Use the addDoctor() function to add the data to the database
                $doctor = new Doctor();
                $doctor->addDoctor($doctorData);

                return true;
            } else{
                $_SESSION['errors'] = $errors;
                return false;
            }
        } else{
            return false;
        }
    }

    public static function processDrugForm(){
        // Initialize an empty array to hold error messages
        $errors = [];

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            // Check if any of the fields are blank
            if (empty($_POST['trade_name']) || empty($_POST['drug_formula']) || empty($_POST['administration_method']) || empty($_POST['dosage_mg']) || empty($_POST['drug_quantity']) || empty($_POST['drug_price']) || empty($_POST['expiry_date'])) {
                $errors[] = "All fields are required.";
            }

            // Check if the dosage is a positive number
            if ($_POST['dosage_mg'] < 0) {
                $errors[] = "Dosage must be a positive number.";
            }

            // Check if the quantity is a positive number
            if ($_POST['drug_quantity'] < 0) {
                $errors[] = "Quantity must be a positive number.";
            }

            // Check if the price is a positive number
            if ($_POST['drug_price'] < 0) {
                $errors[] = "Price must be a positive number.";
            }

            // Check if there are any errors
            if (empty($errors)) {
                // No errors, add the data to the drugData array
                $drugData = [
                    'trade_name' => $_POST['trade_name'],
                    'drug_formula' => $_POST['drug_formula'],
                    'administration_method' => $_POST['administration_method'],
                    'dosage_mg'=> $_POST['dosage_mg'],
                    'drug_quantity'=> $_POST['drug_quantity'],
                    'drug_price' => $_POST['drug_price'],
                    'expiry_date' => $_POST['expiry_date'],
                ];

                // Use the addDrug() function to add the data to the database
                $drug = new Drug();
                $drug->addDrug($drugData);

                return true;
            } else{
                $_SESSION['errors'] = $errors;
                return false;
            }
        } else{
            return false;
        }
    }

    public static function processPatientForm(){
          // Initialize an empty array to hold error messages
        $errors = [];

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            // Check if any of the fields are blank
            if (empty($_POST['patient_firstname']) || empty($_POST['patient_surname']) || empty($_POST['patient_dob']) || empty($_POST['patient_address']) || empty($_POST['patient_email']) || empty($_POST['patient_phone'])) {
                $errors[] = "All fields are required.";
            }

            // Check if the email is in a valid format
            if (!filter_var($_POST['patient_email'], FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format.";
            }

            // Check if the phone number is in a valid format
            if (!preg_match("/^\+\d{1,3}\d{3,14}$/", $_POST['patient_phone'])) {
                $errors[] = "Invalid phone number format. Phone number must start with a '+' followed by the country code and phone number.";
            }

            // Check if there are any errors
            if (empty($errors)) {
                // No errors, add the data to the patientData array
                $patientData = [
                    'patient_firstname' => $_POST['patient_firstname'],
                    'patient_surname' => $_POST['patient_surname'],
                    'patient_dob' => $_POST['patient_dob'],
                    'patient_address' => $_POST['patient_address'],
                    'patient_email' => $_POST['patient_email'],
                    'patient_phone' => $_POST['patient_phone']
                ];

                // Use the addPatient() function to add the data to the database
                $patient = new Patient();
                $patient->addPatient($patientData);

                return true;
            } else{
                $_SESSION['errors'] = $errors;
                    return false;
            }
        } else{
            return false;
        }
    }

    public static function processPharmaceuticalForm(){
        // Start a session
        session_start();

        // Initialize an empty array to hold error messages
        $errors = [];

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            // Check if any of the fields are blank
            if (empty($_POST['company_name']) || empty($_POST['company_address']) || empty($_POST['company_phone'])) {
                $errors[] = "All fields are required.";
            }

            // Check if the phone number is in a valid format
            if (!preg_match("/^\+\d{1,3}\d{3,14}$/", $_POST['company_phone'])) {
                $errors[] = "Invalid phone number format. Phone number must start with a '+' followed by the country code and phone number.";
            }

            // Check if there are any errors
            if (empty($errors)) {
                // No errors, add the data to the pharmaceuticalData array
                $pharmaceuticalData = [
                    'company_name' => $_POST['company_name'],
                    'company_address' => $_POST['company_address'],
                    'company_phone' => $_POST['company_phone']
                ];

                // Use the addPharmaceutical() function to add the data to the database
                $pharmaceutical = new Pharmaceutical();
                $pharmaceutical->addPharmaceutical($pharmaceuticalData);

                return true;
            } else {
                // Store the error messages in a session variable
                $_SESSION['errors'] = $errors;
                return false;
            }
        } else {
            return false;
        }
    }
    
    public static function processPharmacyForm(){
        // Start a session
        session_start();

        // Initialize an empty array to hold error messages
        $errors = [];

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            // Check if any of the fields are blank
            if (empty($_POST['pharmacy_name']) || empty($_POST['pharmacy_address']) || empty($_POST['pharmacy_phone'])) {
                $errors[] = "All fields are required.";
            }

            // Check if the phone number is in a valid format
            if (!preg_match("/^\+\d{1,3}\d{3,14}$/", $_POST['pharmacy_phone'])) {
                $errors[] = "Invalid phone number format. Phone number must start with a '+' followed by the country code and phone number.";
            }

            // Check if there are any errors
            if (empty($errors)) {
                // No errors, add the data to the pharmacyData array
                $pharmacyData = [
                    'pharmacy_name' => $_POST['pharmacy_name'],
                    'pharmacy_address' => $_POST['pharmacy_address'],
                    'pharmacy_phone' => $_POST['pharmacy_phone']
                ];

                // Use the addPharmacy() function to add the data to the database
                $pharmacy = new Pharmacy();
                $pharmacy->addPharmacy($pharmacyData);

                return true;
            } else {
                // Store the error messages in a session variable
                $_SESSION['errors'] = $errors;
                return false;
            }
        } else {
            return false;
        }
    }

    public static function processPrescriptionForm(){
        // Start a session
        session_start();

        // Initialize an empty array to hold error messages
        $errors = [];

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            // Check if any of the fields are blank
            if (empty($_POST['patient_ssn']) || empty($_POST['presc_date'])) {
                $errors[] = "All fields are required.";
            }

            // Check if the patient SSN is a positive number
            if ($_POST['patient_ssn'] < 1) {
                $errors[] = "Patient SSN must be a positive number.";
            }

            // Check if there are any errors
            if (empty($errors)) {
                // No errors, add the data to the prescriptionData array
                $prescriptionData = [
                    'patient_ssn' => $_POST['patient_ssn'],
                    'presc_date' => $_POST['presc_date'],
                ];

                // Use the addPrescription() function to add the data to the database
                $prescription = new Prescription();
                $prescription->addPrescription($prescriptionData);

                return true;
            } else {
                // Store the error messages in a session variable
                $_SESSION['errors'] = $errors;
                return false;
            }
        } else {
            return false;
        }}
    public static function processSupervisorForm(){
        // Start a session
        session_start();

        // Initialize an empty array to hold error messages
        $errors = [];

        // Check if the form has been submitted
        if (isset($_POST['submit'])) {
            // Check if any of the fields are blank
            if (empty($_POST['supervisor_firstname']) || empty($_POST['supervisor_lastname']) || empty($_POST['supervisor_phone'])) {
                $errors[] = "All fields are required.";
            }

            // Check if the phone number is in a valid format
            if (!preg_match("/^\+\d{1,3}\d{3,14}$/", $_POST['supervisor_phone'])) {
                $errors[] = "Invalid phone number format. Phone number must start with a '+' followed by the country code and phone number.";
            }

            // Check if there are any errors
            if (empty($errors)) {
                // No errors, add the data to the supervisorData array
                $supervisorData = [
                    'supervisor_firstname' => $_POST['supervisor_firstname'],
                    'supervisor_lastname' => $_POST['supervisor_lastname'],
                    'supervisor_phone'=> $_POST['supervisor_phone']
                ];

                // Use the addSupervisor() function to add the data to the database
                $supervisor = new Supervisor();
                $supervisor->addSupervisor($supervisorData);

                return true;
            } else {
                // Store the error messages in a session variable
                $_SESSION['errors'] = $errors;
                return false;
            }
        } else {
            return false;
        }
    }
}

?>