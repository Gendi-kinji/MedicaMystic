<?php
if(isset($_GET["id"])){
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/doctor.class.php";

    $id = $_GET["id"];

    $doctor = new Doctor();
    $doctor_row = $doctor->getDoctor($id);

    // Extract values: 
    $doctor_firstname = $doctor_row[0]['doctor_firstname'];
    $doctor_surname = $doctor_row[0]['doctor_surname'];
    $doctor_dob = $doctor_row[0]['doctor_dob'];
    $doctor_address = $doctor_row[0]['doctor_address'];
    $doctor_email = $doctor_row[0]['doctor_email'];
    $years_of_exp = $doctor_row[0]['years_of_exp'];
    $doctor_phone = $doctor_row[0]['doctor_phone'];

    // Starting a session to hold the id:
    session_start();
    $_SESSION['id'] = $_GET["id"];

    } ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/form_styles/add_doctors.css" />
    <title>Doctors Form</title>
  </head>
  <body>
    <form action="../tables/editable/manage_doctors.php" method="GET">
      <input type="submit" value="View Doctors Table" />
    </form>
    <form
      class="doctor-form"
      action="../../updators/doctor.updator.php"
      method="POST"
    >
      <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
      <header id="doctor-form-header">
        <h3 id="doctor-form-title">Doctors Form</h3>
        <h4>Enter your details below</h4>
      </header>
      <label for="doctor_firstname">First Name</label>
      <input
        type="text"
        id="doctor_firstname"
        name="doctor_firstname"
        placeholder="First name..."
        value="<?php echo $doctor_firstname;?>"
        required
      />
      <label for="doctor_surname">Surname</label>
      <input
        type="text"
        id="doctor_surname"
        name="doctor_surname"
        placeholder="Surname..."
        value="<?php echo $doctor_surname;?>"
        required
      />
      <label for="doctor_dob">Date of Birth</label>
      <input
        type="date"
        id="doctor_dob"
        name="doctor_dob"
        value="<?php echo $doctor_dob;?>"
        required
      />
      <label for="doctor_address">Address</label>
      <input
        type="text"
        id="doctor_address"
        name="doctor_address"
        placeholder="Address..."
        value="<?php echo $doctor_address;?>"
        required
      />
      <label for="doctor_email">Email</label>
      <input
        type="email"
        id="doctor_email"
        name="doctor_email"
        placeholder="someone@example.com"
        value="<?php echo $doctor_email;?>"
        required
      />
      <label for="years_of_exp">Years of experience</label>
      <input
        type="number"
        id="years_of_exp"
        name="years_of_exp"
        min="0"
        max="100"
        value="<?php echo $years_of_exp;?>"
      />
      <label for="doctor_phone">Phone</label>
      <input
        type="text"
        id="doctor_phone"
        name="doctor_phone"
        list="country-codes"
        value="<?php echo $doctor_phone;?>"
        required
      />
      <datalist id="country-codes">
        <option value="+254">Kenya</option>
        <option value="+255">Tanzania</option>
        <option value="+256">Uganda</option></datalist
      ><br />
      <button type="submit" name="submit" value="Update">Update</button><br />
    </form>
  </body>
</html>
