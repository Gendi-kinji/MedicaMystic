<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="/styles.css">-->
    <title>Patients Form</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: aliceblue;
        }
        form {
            margin: 0% auto;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 20px;
            width: 360px;
            align-items: center;
            background: linear-gradient(176deg, rgb(49 124 49), #22ef22);
        }
        #patient-form-header{
            text-align: center;
        }
        h4{
            font-style: italic;
            font-weight: normal;
        }
        #button-submit:hover{
            background: rgb(110, 106, 106);
            color: white;

        }
    </style>
</head>
<body>
    <form id="patient-form" action="process_patients.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="patient-form-header">
            <h3 id="patient-form-title">Patient Form</h3>
            <h4>Enter your details below</h4>
        </header>
        <!--<label for="patient_ssn">SSN</label>
        <input type="text" id="patient_ssn" name="patient_ssn" placeholder="SSN...">-->
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
        <input type="submit" value="Submit"><br>
    </form>
</body>
</html>