<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background: aliceblue;
        }
        #main-container{
            border: 1px solid black;
            border-radius: 20px;
            background: linear-gradient(180deg, rgb(223, 217, 229), rgb(242, 232, 250));
            height: 420px;
            margin: 0% auto;
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: center;
            align-items: center;
        }
        .dispensary-logo{
            width: 160px;
            height: 120px;
        }
        
    </style>
</head>
<body>
    <div id="main-container">
        <div id="welcome-header">
            <h2>DRUG DISPENSARY NAME</h2>
            <img class="dispensary-logo" alt="Dispensary Logo" src="/form_icons/laboratory.jpg">
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