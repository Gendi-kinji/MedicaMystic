<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="/styles.css">-->
    <title>Pharmaceutical Form</title>
    <style>
        body{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background: aliceblue;
        }
        form.pharmaceutical-form {
            margin: 0% auto;
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 20px;
            width: 360px;
            align-items: center;
            background: linear-gradient(176deg, rgb(37 145 195), #00ffc8);
        }
        #pharmaceutical-form-header{
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
    <form action="../view/view_pharmaceutical.php" method="GET">
        <input type="submit" value="View Pharmaceutical Table">
    </form>
    <form class="pharmaceutical-form" action="../process/process_pharmaceutical.php" method="POST">
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
        <input type="submit" value="Submit"><br>
    </form>
</body>
</html>