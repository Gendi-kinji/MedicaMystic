<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <link rel="stylesheet" href="./styles/sign_in.css">
        <title>Sign In</title>
    </head>
    <body>
        <form action="/process/admin-login.process.php" method="POST">
            <div class="form-header">
                <h1>DRUG DISPENSARY NAME</h1>
            </div>
            <div class="form-content">
                <h2>Admin Login</h2>
                <input type="text" placeholder="Email or Username" id="admin_name" name="admin_name"><br>
                <input type="password" placeholder="Enter password..." id="admin_pass" name="admin_pass"><br>
                <div class="form-buttons">
                    <button type="submit" name="submit" value="submit">Submit</button><br>
                </div><br>
                <a href="admin_register.php">New admin?</a>
                <br>
            </div>
        </form>
    </body>
</html>


