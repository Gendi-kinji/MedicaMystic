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
                <div class="form-border"></div>
                <h2>SIGN IN</h2>
                <input type="text" placeholder="username"><br>
                <input type="password" placeholder="password"><br>
                <div class="password-container">
                    <input type="checkbox" id="show-password" name="show-password">
                    <label id="show-password-label" for="show-password">Show password</label>
                    <a id="forgot-password" href="">forgot password</a>
                </div>
                <div class="form-buttons">
                    <button>Clear</button>
                    <input type="submit" value="Submit"><br>
                </div>                
                
                <a href="./register.php">New user?</a>
            </div>
        </form>
    </body>
</html>


