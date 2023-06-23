<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_supervisors.css">
    <title>Supervisor Form</title>
    <style>
        
    </style>
</head>
<body>
    <form action="../view_tables/view_supervisors.php" method="GET">
        <input type="submit" value="View Supervisors Table">
    </form>
    <form class="supervisor-form" action="../process/supervisor.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="supervisor-form-header">
            <h3 id="supervisor-form-title">Supervisor Form</h3>
            <h4>Enter your details below</h4>
        </header>
        <label for="supervisor_firstname">First Name</label>
        <input type="text" id="supervisor_firstname" name="supervisor_firstname" placeholder="First name..." required>
        <label for="supervisor_lastname">Last Name</label>
        <input type="text" id="supervisor_lastname" name="supervisor_lastname" placeholder="Last name..." required>
        <!--<label for="supervisor_lastname">Address</label>
        <input type="text" id="supervisor_address" name="supervisor_address" placeholder="Address..." required>
        <label for="supervisor_phone">Phone</label>
        <input type="text" id="supervisor_phone" name="supervisor_phone" list="country-codes" required>
        <datalist id="country-codes">
            <option value="+254">Kenya</option>
            <option value="+255">Tanzania</option>
            <option value="+256">Uganda</option>
        </datalist><br>-->
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form>
</body>
</html>