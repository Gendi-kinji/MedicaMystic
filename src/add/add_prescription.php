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
    <form action="../view_tables/view_prescription.php" method="GET">
        <input type="submit" value="View prescription Table">
    </form>
    <form class="prescription-form" action="../process/prescription.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="prescription-form-header">
            <h3 id="prescription-form-title">prescription Form</h3>
            <h4>Enter your details below</h4>
        </header>
        <label for="patient_ssn">Patient SSN</label>
        <input type="number" min="1" max="1000" id="patient_ssn" name="patient_ssn" placeholder="SSN..." required>
        <label for="prescription_address">Patient Address</label>
        <input type="text" id="prescription_address" name="prescription_address" placeholder="Address..." required>
        <label for="prescription_phone">Phone</label>
        <input type="text" id="prescription_phone" name="prescription_phone" list="country-codes" required>
        <datalist id="country-codes">
            <option value="+254">Kenya</option>
            <option value="+255">Tanzania</option>
            <option value="+256">Uganda</option>
        </datalist><br>
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form>
</body>
</html>