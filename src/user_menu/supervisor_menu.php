<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmaceutical Page</title>
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
    ?>
    <header class="page-header">
         <!--Displaying the username on the page-->
        <span style="margin-left:50%; align=right;" id="welcome-username">Welcome, <?php echo $user_name; ?></span>
        <h1>Supervisor Menu</h1>
    </header>
    <hr>
    <div class="user-options">
    <a class="supervisor" href="supervisor_options/supervisor_profile.php">Supervisor details</a>
    <a class="supervisor" href="">Manage Contract</a>
    </div>
</body>
</html>