<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="/styles.css">-->
    <title>Supervisor Form</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: aliceblue;
        }
        form.supervisor-form {
            margin: 0% auto;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 20px;
            width: 360px;
            align-items: center;
            background: linear-gradient(176deg, rgb(177 37 195), #00d0ff);
        }
        #supervisor-form-header{
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
    <form action="../view/view_supervisors.php" method="GET">
        <input type="submit" value="View Supervisors Table">
    </form>
    <form class="supervisor-form" action="../process/process_supervisors.php" method="POST">
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
        <input type="submit" value="Submit"><br>
    </form>
</body>
</html>