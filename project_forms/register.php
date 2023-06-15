<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="./styles/register.css">
        <title>Registration page</title>
    </head>
    <body>
        <h>DRUG DISPENSARY NAME</h>
        <img alt="image of logo">
        <form action="./process/process_register_details.php" method="POST">
            <h3>REGISTER</h3>
            <input type="text" placeholder="username"><br>
            <label for="register"></label>
            <select name="user-type" id="register">
                <option value="patient">Patient</option>
                <option value="doctor">Doctor</option>
                <option value="pharmaceutical_company">Pharmaceutical Company</option>
                <option value="pharmacist">Pharmacist</option>
                <option value="supervisor">Supervisor</option>
            </select>
            <input type="password" placeholder="password"><br>
            <input type="text" placeholder="Confirm password"><br>
            <input type="checkbox" id="show">
            <label for="show">Show password</label>
            <button>Clear</button>
            <input type="submit" value="Submit"><br>
            <a href="Sign in page.html" target="_blank">Already have an account?</a>
        </form>
    </body>
    </html>