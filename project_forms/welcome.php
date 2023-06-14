<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/welcome.css">
    <title>Welcome Page</title>
</head>
<body>
    <div id="main-container">
        <div class="welcome-header">
            <h2>DRUG DISPENSARY NAME</h2>
            <img class="dispensary-logo" alt="Dispensary Logo" src="./form_icons/laboratory.jpg">
        </div>
        <br>
        <div id="welcome-options">
            <form action="/register.php" method="GET">
                <input type="submit" value="Register">
            </form>
            <br>
            <form action="/sign_in.php" method="GET">
                <input type="submit" value="Sign In">
            </form>
        </div>
    </div>
</body>
</html>