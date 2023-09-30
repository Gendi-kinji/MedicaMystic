<?php
include './inc/status_functions.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, inital-scale=1.0">
        <link rel="stylesheet" href="./styles/sign_in.css">
        <title>Sign In</title>
    </head>
    <body>
        <form action="./process/admin-login.process.php" method="POST">
            <div class="form-header">
                <h1>MedicaMystic Dispensary</h1>
                <img
                    id="img-syringe"
                    alt="Image of syringe"
                    title="Syringe: From Flaticon"
                    src="/form_icons/syringe.png"
                />
            </div>
            <div class="form-content">
                <div class="sign-in-section">
                    <h2>ADMIN SIGN IN</h2>
                    <span>Authorised access only</span><br>
                    <input type="text" placeholder="Email or Username" id="admin_name" name="admin_name"><br>
                    <input type="password" placeholder="Enter password..." id="admin_pass" name="admin_pass"><br>
                    <div class="form-buttons">
                        <button type="submit" name="submit" value="submit">Submit</button><br>
                    </div><br><br>
                    <a href="./admin_register.php">New admin?</a>
                    <br>
                    <?php
                        print_login_status()
                    ?>
                </div>    
            </div>
        </form>
    </body>
    <script src="./scripts/status_functions.js"></script>
</html>


