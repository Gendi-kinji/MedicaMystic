<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_pharmacy.css">
    <title>Pharmacy Form</title>
</head>
<body>
    <form action="../tables/editable/manage_pharmacy.php" method="GET">
        <input type="submit" value="View Pharmacy Table">
    </form>
    <form class="pharmacy-form" action="../process/pharmacy.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="pharmacy-form-header">
            <h3 id="pharmacy-form-title">Pharmacy Form</h3>
            <h4>Enter details below</h4>
        </header>
        <label for="pharmacy_name">Pharmacy Name</label>
        <input type="text" id="pharmacy_name" name="pharmacy_name" placeholder="Pharmacy name..." required>
        <label for="pharmacy_address">Address</label>
        <input type="text" id="pharmacy_address" name="pharmacy_address" placeholder="Address..." required>
        <label for="pharmacy_phone">Phone</label>
        <input type="text" id="pharmacy_phone" name="pharmacy_phone" list="country-codes" required>
        <datalist id="country-codes">
            <option value="+254">Kenya</option>
            <option value="+255">Tanzania</option>
            <option value="+256">Uganda</option>
        </datalist><br>
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form>
</body>
</html>