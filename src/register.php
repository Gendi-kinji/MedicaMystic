<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/styles/register.css">
    <title>Registration page</title>
</head>

<body>
    <header id="page-header">
        <h1>DRUG DISPENSARY NAME</h1>
        <img alt="image of logo">
    </header>
    <form id="register-form" action="/process/register.process.php" method="POST">
        <h3>REGISTER</h3>
        <h4>Enter your details below</h4>
        <label for="user_name">Username</label>
        <input type="text" placeholder="Username..." name="user_name" id="user_name" required><br>
        <label for="user_email">Email</label>
        <input type="email" placeholder="someone@example.com" name="user_email" id="user_email" required><br>
        <label for="user_type">Select type</label>
        <select name="user_type" id="user_type">
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
            <option value="pharmaceutical_company">Pharmaceutical Company</option>
            <option value="pharmacist">Pharmacist</option>
            <option value="supervisor">Supervisor</option>
        </select><br>
        <label for="user_pass">Enter password</label>
        <input type="password" placeholder="Password" id="user_pass" name="user_pass" required><br>
        <label for="user_pass_confirm">Confirm password</label>
        <input type="password" placeholder="Confirm Password" id="user_pass_confirm" name="user_pass_confirm" required><br>
        <button type="submit" id="submit" name="submit" value="submit">Submit</button><br>
        <a href="sign_in.php" target="_self">Already have an account?</a>
    </form>
</body>

</html>