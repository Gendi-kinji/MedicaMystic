<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <link rel="stylesheet" href="./styles/sign_in.css">
        <title> Sign in page </title>
    </head>
    <body>
        

        <form action="./process/confirm_sign_in.php" method="GET">
            <div class="form-header">
                <h1>DRUG DISPENSARY NAME</h1>
            </div>
            <div class="form-content">
                <h2>SIGN IN</h2>
                <input type="text" placeholder="username" id="user_name" name="user_name"><br>
                <input type="password" placeholder="Enter password..." id="user_pass" name="user_pass"><br>
                <div class="form-buttons">
                    <button type="submit">Submit</button><br>
                </div>                
                <a href="./register.php">New user?</a>
                <a href="">Forgot password</a>
                <br>
            </div>
        </form>
    </body>
</html>


