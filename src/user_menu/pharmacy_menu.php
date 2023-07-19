<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Page</title>
    <link rel="stylesheet" href="../styles/user_menu.css">
    <style>
        .pharmacy{
            display:flex;
            flex-direction: row;
        }
        .medicine{
            display:flex;
            flex-direction:row;
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
        <h1>Pharmacy Menu</h1>
       
    </header>
    <hr>
    <a class="pharmacy" href="">Pharmacy Details</a>
    <a class="pharmacy" href="">Manage Inventory</a>
    <a class="pharmacy" href="">View Prescriptions</a>
    <a class="pharmacy" href="../tables/select_record/select_prescription.php">Dispense Medicine</a>
    <a class="medicine" href="">Manage Supervisors</a>
    <a class="medicine" href="">Purchase drugs</a>
</body>
</html>