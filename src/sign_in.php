<?php
include './inc/status_functions.inc.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/sign_in.css">
    <title>Sign In</title>
</head>

<body>
    <form action="./process/signin.process.php" method="POST">
        <div class="form-header">
            <h1>MedicaMystic Dispensary</h1>
            <img id="img-syringe" alt="Image of syringe" title="Syringe: From Flaticon" src="/form_icons/syringe.png" />
        </div>
        <div class="form-content">
            <div class="sign-in-section">
                <h2>SIGN IN</h2>
                <input type="text" placeholder="Email or Username" id="user_name" name="user_name"><br>
                <input type="password" placeholder="Enter password..." id="user_pass" name="user_pass"><br>
                <div class="form-buttons">
                    <button type="submit" name="submit" value="submit">Submit</button><br>
                </div><br><br>
                <a href="./register.php">New user?</a>
                <br>
                <?php
                print_login_status();
                ?>
            </div>
        </div>
    </form>
</body>
<script src="./scripts/status_functions.js"></script>

</html>