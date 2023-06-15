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
            <input type="text" placeholder="username" name="user_name" id="user_name" required><br>
            <label for="user_type">Select type</label>
            <select name="user_type" id="user_type">
                <option value="patient">Patient</option>
                <option value="doctor">Doctor</option>
                <option value="pharmaceutical_company">Pharmaceutical Company</option>
                <option value="pharmacist">Pharmacist</option>
                <option value="supervisor">Supervisor</option>
            </select>
            <input type="password" placeholder="password" id="user_pass" name="user_pass" required>
            <input type="submit" value="Submit" required><br>
            <a href="sign_in.php" target="_blank">Already have an account?</a>
        </form>
    </body>
    </html>