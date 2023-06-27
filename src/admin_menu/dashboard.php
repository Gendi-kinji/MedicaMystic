<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="../styles/user_menu.css">
</head>
<body style="text-align:center;">
    <?php
        // Resume the session started by the verifyUserDetails() function and reclaim the admin_name:
        session_start();
        $admin_name = $_SESSION['admin_name'];
    ?>
    <header class="page-header">
         <!--Displaying the username on the page-->
        <span style="margin-left:50%; align=right;" id="welcome-username">Welcome, <?php echo $admin_name; ?></span>
        <h1>Admin Dashboard</h1>
       
    </header>
    <hr>
</body>
</html>