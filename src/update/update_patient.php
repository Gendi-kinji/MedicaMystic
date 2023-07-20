<?php
if(isset($_GET["id"])){
    require "../classes/connection.class.php";
    require "../classes/databasehandler.class.php";
    require "../classes/models/patient.class.php";

    $id = $_GET["id"];

    $patient = new Patient();
    $patient_row = $patient->getPatient($id); 

    // Extract values:
    $patient_firstname = $patient_row[0]['patient_firstname'];
    $patient_surname = $patient_row[0]['patient_surname'];
    $patient_dob = $patient_row[0]['patient_dob'];
    $patient_address = $patient_row[0]['patient_address'];
    $patient_email = $patient_row[0]['patient_email'];
    $patient_phone = $patient_row[0]['patient_phone'];

    // Starting a session to hold the id:
    session_start();
    $_SESSION['id'] = $_GET["id"];
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/form_styles/add_patients.css" />
    <title>Patients Form</title>
  </head>
  <body>
  <form action="../tables/editable/manage_patients.php" method="GET">
      <input type="submit" value="View Patients Table" />
    </form>
    <form
      class="patient-form"
      action="../../updators/patient.updator.php"
      method="POST"
    >
      <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
      <header id="patient-form-header">
        <h3 id="patient-form-title">Patient Form</h3>
        <h4>Enter your details below</h4>
      </header>
      <!--<label for="patient_ssn">SSN</label>
        <input type="text" id="patient_ssn" name="patient_ssn" placeholder="SSN...">-->
      <label for="patient_firstname">First Name</label>
      <input type="text" id="patient_firstname" name="patient_firstname"
      placeholder="First name..." required value="<?php echo $patient_firstname;?>">
      <label for="patient_surname">Surname</label>
      <input
        type="text"
        id="patient_surname"
        name="patient_surname"
        placeholder="Surname..."
        required
        value="<?php echo $patient_surname;?>"
      />
      <label for="patient_dob">Date of Birth</label>
      <input type="date" id="patient_dob" name="patient_dob" required value="<?php echo $patient_dob;?>"/>
      <label for="patient_address">Address</label>
      <input
        type="text"
        id="patient_address"
        name="patient_address"
        placeholder="Address..."
        required
        value="<?php echo $patient_address;?>"
      />
      <label for="patient_email">Email</label>
      <input
        type="email"
        id="patient_email"
        name="patient_email"
        placeholder="someone@example.com"
        required
        value="<?php echo $patient_email;?>"
      />
      <label for="patient_phone">Phone</label>
      <input
        type="text"
        id="patient_phone"
        name="patient_phone"
        list="country-codes"
        required
        value="<?php echo $patient_phone;?>"
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
