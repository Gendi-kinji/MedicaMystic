<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Menu</title>
    <link rel="stylesheet" href="../styles/patient_menu.css">
</head>
<body>
    <?php
        // Resume the session started by the erifyUserDetails() function and reclaim the user_name:
        session_start();
        $user_name = $_SESSION['user_name'];
    ?>
    <header class="page-header">
         <!--Displaying the username on the page-->
        <span id="welcome-username">Welcome, <?php echo $user_name; ?></span>
        <h1>Patient Menu</h1>
       
    </header>
</body>
</html>