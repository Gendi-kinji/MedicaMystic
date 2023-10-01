<?php
if (isset($_GET["id"])) {
    require_once "../inc/autoloader.inc.php";

    $id = $_GET["id"];

    $prescription = new Prescription();
    $prescription_row = $prescription->getPrescription($id);

    // Extract values: 
    $patient_ssn = $prescription_row[0]['patient_ssn'];
    $presc_date = $prescription_row[0]['presc_date'];

    // Starting a session to hold the id:
    session_start();
    $_SESSION['id'] = $_GET["id"];

} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_prescriptions.css">
    <title>Prescriptions Form</title>
</head>

<body>
    <form action="/tables/editable/manage_prescriptions.php" method="GET">
        <input type="submit" value="View Prescriptions Table">
    </form>
    <form class="prescription-form" action="../../updators/prescription.updator.php" method="POST">
        <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="prescription-form-header">
            <h3 id="prescription-form-title">Prescription Form</h3>
            <h4>Enter details below</h4>
        </header>
        <label for="patient_ssn">Patient SSN</label>
        <input type="number" min="1" max="100000" id="patient_ssn" name="patient_ssn" placeholder="SSN..."
            value="<?php echo $patient_ssn ?>" required>
        <label for="presc_date">Prescription Date</label>
        <input type="date" id="presc_date" name="presc_date" value="<?php echo $presc_date ?>"><br>
        <button type="submit" value="submit">Submit</button><br>
    </form>
</body>
<script src="../scripts/drug_image_preview.js"></script>
<script src="../scripts/status_functions.js"></script>

</html>