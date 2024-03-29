<?php
// includes and requires go here
require_once '../inc/status_functions.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_patients.css">
    <title>Patients Form</title>
</head>

<body>
    <?php
    print_form_status(); // print the  success/error status of the form
    ?>
    <form action="../tables/editable/manage_patients.php" method="GET">
        <input type="submit" value="View Patients Table">
    </form>
    <form class="patient-form" action="../process/patient.process.php" method="POST">
        <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="patient-form-header">
            <h3 id="patient-form-title">Patient Form</h3>
            <h4>Enter details below</h4>
        </header>
        <label for="patient_firstname">First Name</label>
        <input type="text" id="patient_firstname" name="patient_firstname" placeholder="First name..." required>
        <label for="patient_surname">Surname</label>
        <input type="text" id="patient_surname" name="patient_surname" placeholder="Surname..." required>
        <label for="patient_dob">Date of Birth</label>
        <input type="date" id="patient_dob" name="patient_dob" required>
        <label for="patient_address">Address</label>
        <input type="text" id="patient_address" name="patient_address" placeholder="Address..." required>
        <label for="patient_email">Email</label>
        <input type="email" id="patient_email" name="patient_email" placeholder="someone@example.com" required>
        <label for="patient_phone">Phone</label>
        <input type="text" id="patient_phone" name="patient_phone" list="country-codes" required>
        <datalist id="country-codes">
            <option value="+254">Kenya</option>
            <option value="+255">Tanzania</option>
            <option value="+256">Uganda</option>
        </datalist><br>
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form>
</body>
<script src="../scripts/drug_image_preview.js"></script>
<script src="../scripts/status_functions.js"></script>

</html>