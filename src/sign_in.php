<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <link rel="stylesheet" href="./styles/sign_in.css">
        <title>Sign In</title>
    </head>
    <body>
        <form action="./process/signin.process.php" method="POST">
            <div class="form-header">
                <h1>DRUG DISPENSARY NAME</h1>
            </div>
            <div class="form-content">
                <h2>SIGN IN</h2>
                <input type="text" placeholder="Email or Username" id="user_name" name="user_name"><br>
                <input type="password" placeholder="Enter password..." id="user_pass" name="user_pass"><br>
                <div class="form-buttons">
                    <button type="submit" name="submit" value="submit">Submit</button><br>
                </div><br>                
                <a href="./register.php">New user?</a>
                <br>
                </div>
        </form>
    </body>
</html>


