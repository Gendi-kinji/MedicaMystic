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
                <input type="text" placeholder="username"><br>
                <input type="password" placeholder="password"><br>
                <div class="form-buttons">
                    <button>Clear</button>
                    <input type="submit" value="Submit"><br>
                </div>                
                
                <a href="./register.php">New user?</a>
                <a href="">Forgot password</a>
                <br>
            </div>
        </form>
    </body>
</html>


