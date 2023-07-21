<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_supervisors.css">
    <title>Supervisor Form</title>
    <style>
        
    </style>
</head>
<body>
    <?php
        $user_id = "";
        // Start a session
        session_start();
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
        } else{
            echo "<span style='color: red;'>User id not set.</span>";
        }

        // Display error messages if there are any
        if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            echo '<ul id="error_msg">';
            foreach ($_SESSION['errors'] as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul>';

            // Clear the errors from the session
            unset($_SESSION['errors']);
        } elseif(isset($_SESSION['success']) && !empty($_SESSION['success']) && $_SESSION['success']){
            echo '<span id="success_msg">Record added successfully</span>';
        }
    ?>
    <h3 style="text-align: center;">Do your details exist? Contact your pharmacy to add your user id.</h3>
    <form class="supervisor-form" action="../process/process_reg_details/supervisor-details.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="supervisor-form-header">
            <h3 id="supervisor-form-title">Supervisor Form</h3>
            <h4>Enter your details below</h4>
        </header>
        <label for="supervisor_firstname">First Name</label>
        <input type="text" id="supervisor_firstname" name="supervisor_firstname" placeholder="First name..." required>
        <label for="supervisor_lastname">Last Name</label>
        <input type="text" id="supervisor_lastname" name="supervisor_lastname" placeholder="Last name..." required>
        <label for="supervisor_lastname">Address</label>
        <input type="text" id="supervisor_address" name="supervisor_address" placeholder="Address..." required>
        <label for="supervisor_phone">Phone</label>
        <input type="text" id="supervisor_phone" name="supervisor_phone" list="country-codes" required>
        <datalist id="country-codes">
            <option value="+254">Kenya</option>
            <option value="+255">Tanzania</option>
            <option value="+256">Uganda</option>
        </datalist><br>
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $user_id?>">
        <button type="submit" name="submit" value="submit">Submit</button><br>
    </form>
</body>
</html>