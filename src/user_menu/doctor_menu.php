<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Page</title>
    <link rel="stylesheet" href="../styles/user_menu.css">
    <style>
        .doctor{
            display:flex;
            flex-direction: row;
        }
    </style>
</head>
<body style="text-align:center;">
    <?php
        // Resume the session started by the verifyUserDetails() function and reclaim the user_name:
        session_start();
        $user_name = $_SESSION['user_name'];
    ?>
    <header class="page-header">
         <!--Displaying the username on the page-->
        <span style="margin-left:50%; align=right;" id="welcome-username">Welcome, <?php echo $user_name; ?></span>
        <h1>Doctor Menu</h1>
       
    </header>
    <hr>
    <a class="doctor" href="">Doctor Details</a>
    <a class="doctor" href="">Manage Prescriptions</a>
    <a class="doctor" href="">View Available Drugs</a>
    <a class="doctor" href="">View Appointments</a>
    
</body>
</html>