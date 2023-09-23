<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_doctors.css">
    <title>Doctors Form</title>
</head>
<body>
    <?php
        print_form_status(); // print the  success/error status of the form
    ?>
    <form action="../tables/editable/manage_doctors.php" method="GET">
        <input type="submit" value="View Doctors Table">
    </form>
    <form class="doctor-form" action="../process/doctor.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="doctor-form-header">
            <h3 id="doctor-form-title">Doctors Form</h3>
            <h4>Enter details below</h4>
        </header>
        <label for="doctor_firstname">First Name</label>
        <input type="text" id="doctor_firstname" name="doctor_firstname" placeholder="First name..." required>
        <label for="doctor_surname">Surname</label>
        <input type="text" id="doctor_surname" name="doctor_surname" placeholder="Surname..." required>
        <label for="doctor_dob">Date of Birth</label>
        <input type="date" id="doctor_dob" name="doctor_dob" required>
        <label for="doctor_address">Address</label>
        <input type="text" id="doctor_address" name="doctor_address" placeholder="Address..." required>
        <label for="doctor_email">Email</label>
        <input type="email" id="doctor_email" name="doctor_email" placeholder="someone@example.com" required>
        <label for="years_of_exp">Years of experience</label>
        <input type="number" id="years_of_exp" name="years_of_exp" min="0" max="100">
        <label for="doctor_phone">Phone</label>
        <input type="text" id="doctor_phone" name="doctor_phone" list="country-codes" required>
        <datalist id="country-codes">
            <option value="+254">Kenya</option>
            <option value="+255">Tanzania</option>
            <option value="+256">Uganda</option>
        </datalist><br>
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form>
</body>
</html>