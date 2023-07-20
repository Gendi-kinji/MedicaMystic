<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Page</title>
    <link rel="stylesheet" href="../styles/user_menu.css">
</head>
<body style="text-align:center;">
    <?php
            session_start();
            if(isset($_SESSION['user_name'])){
                $user_name = $_SESSION['user_name'];
            }else{
                $user_name = 'user';
            }
    ?>
    <header class="page-header">
         <!--Displaying the username on the page-->
        <span style="margin-left:50%; align=right;" id="welcome-username">Welcome, <?php echo $user_name; ?></span>
        <h1>Pharmacy Menu</h1>
       
    </header>
    <hr>
    <div class="user-options">
        <a href="">Pharmacy Details</a>
        <a href="">Manage Inventory</a>
        <a href="">View Prescriptions</a>
        <a href="../tables/select_record/select_prescription.php">Dispense Medicine</a>
        <a href="">Manage Supervisors</a>
        <a href="">Purchase drugs</a>
    </div>
    
</body>
</html>