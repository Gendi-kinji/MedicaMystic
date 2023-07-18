<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./styles/register.css">
    <title>Admin Registration Page</title>
</head>

<body>
    <header id="page-header">
        <h1>DRUG DISPENSARY NAME</h1>
        <img alt="image of logo">
    </header>
    <form id="register-form" action="./process/admin-register.process.php" method="POST">
        <h3>REGISTER</h3>
        <h4>Enter your details below</h4>
        <label for="admin_name">Username</label>
        <input type="text" placeholder="Username..." name="admin_name" id="admin_name" required><br>
        <label for="admin_email">Email</label>
        <input type="email" placeholder="someone@example.com" name="admin_email" id="admin_email" required><br>
        <label for="admin_pass">Enter password</label>
        <input type="password" placeholder="Password" id="admin_pass" name="admin_pass" required><br>
        <label for="admin_pass_confirm">Confirm password</label>
        <input type="password" placeholder="Confirm Password" id="admin_pass_confirm" name="admin_pass_confirm" required><br>
        <button type="submit" id="submit" name="submit" value="submit">Submit</button><br>
        <a href="admin_login.php" target="_self">Already have an admin account?</a>
    </form>
</body>

</html>