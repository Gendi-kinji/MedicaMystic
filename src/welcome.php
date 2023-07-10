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
    <nav id="home-nav">
        <a href="">Home</a>
        <a href="about.php">About</a>
    </nav>
    <!--ABOVE THE FOLD-->
    <div id="welcome-container">
        <div class="welcome-header">
            <!--the page header-->
            <h2>MedicaMystic Dispensary</h2>
            <span id="page-headline"><b>Get your <span class="headline-word">meds</span> with no stress!</b></span>
            <br>
            <span id="page-subheadline">Sign in or register to access the drug dispensary</span>
            <br><br>
            <div class="welcome-options">
                <!--call to action-->
                <a class="btn-links btn-register" href="register.php">Register</a>
                <a class="btn-links btn-sign_in" href="sign_in.php">Sign In</a>
            </div>
        </div>
        <br><br>
        <div id="header-image">
            <!--header-image-->
            <img class="dispensary-logo" alt="Dispensary Logo" src="./form_icons/laboratory.jpg">
        </div>
    </div>

    <!--BELOW THE FOLD-->
    <div id="benefits-container">
        <div class="benefits-section">
            <h2>Smooth, super, and superb</h2>
            <h3>Why use MedicaMystic?</h3>
            <div class="benefits-list">
                <span>Convenient</span><br>
                <span>Easy to use</span><br>
                <span>Your conscience says so</span>
            </div>
        </div>
    </div>
</body>
</html>