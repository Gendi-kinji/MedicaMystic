<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="/styles.css">-->
    <title>Doctors Form</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: aliceblue;
        }
        form.doctor-form {
            margin: 0% auto;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 20px;
            width: 360px;
            align-items: center;
            background: linear-gradient(176deg, rgb(124 37 195), #ef22b6);
        }
        #doctor-form-header{
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
    <form action="../view/view_doctors.php" method="GET">
        <input type="submit" value="View Doctors Table">
    </form>
    <form class="doctor-form" action="../process/process_doctors.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="doctor-form-header">
            <h3 id="doctor-form-title">Doctors Form</h3>
            <h4>Enter your details below</h4>
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
        <input type="submit" value="Submit"><br>
    </form>
</body>
</html>