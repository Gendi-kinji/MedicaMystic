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
      include '../common_sections/topbar.php';
    ?><br>
    <?php
            session_start();
            if(isset($_SESSION['user_name'])){
                $user_name = $_SESSION['user_name'];
            }else{
                $user_name = 'user';
            }
            if(isset($_SESSION['user_id'])){
                $user_id = $_SESSION['user_id'];
            }else{
                echo '<span>User ID not set.</span>';
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
        <a href="../tables/editable/manage_drugs.php">Manage Drug Inventory</a>
        <a href="../tables/read_only/view_prescriptions.php">View Prescriptions</a>
        <a href="../tables/select_record/select_prescription.php">Dispense Medicine</a>
        <a href="../tables/editable/manage_supervisors.php">Manage Supervisors</a>
        <a href="">Purchase drugs</a>
    </div>
    
</body>
</html>