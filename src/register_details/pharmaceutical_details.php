<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_pharmaceutical.css">
    <title>Pharmaceutical Form</title>
</head>
<body>
    <form class="pharmaceutical-form" action="../process/process_reg_details/pharmaceutical-details.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="pharmaceutical-form-header">
            <h3 id="pharmaceutical-form-title">Pharmaceutical Form</h3>
            <h4>Enter your details below</h4>
        </header>
        <label for="company_name">Company Name</label>
        <input type="text" id="company_name" name="company_name" placeholder="Pharmaceutical name..." required>
        <label for="company_address">Address</label>
        <input type="text" id="company_address" name="company_address" placeholder="Address..." required>
        <label for="company_phone">Phone</label>
        <input type="text" id="company_phone" name="company_phone" list="country-codes" required>
        <datalist id="country-codes">
            <option value="+254">Kenya</option>
            <option value="+255">Tanzania</option>
            <option value="+256">Uganda</option>
        </datalist><br>
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form>
</body>
</html>