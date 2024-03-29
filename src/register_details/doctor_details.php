<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_doctors.css">
    <title>Doctors Form</title>
</head>
<body>
    <?php
        $user_id = "";
        // Start a session
        session_start();
        if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
            $user_id = $_SESSION['user_id'];
            echo '<span> User id: '.$user_id.'</span>';
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
    <form class="doctor-form" action="../process/process_reg_details/doctor-details.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="doctor-form-header">
            <h3 id="doctor-form-title">Doctors Form</h3>
            <h4>Enter your details below</h4>
        </header>
        <label for="doctor_firstname">First Name</label>
        <input type="text" id="doctor_firstname" name="doctor_firstname" placeholder="First name..." required>
        <label for="doctor_surname">Surname</label>
        <input type="text" id="doctor_surname" name="doctor_surname" placeholder="Surname..." required>
        <label for="doctor_dob">Date of Birth</label>
        <input type="date" id="doctor_dob" name="doctor_dob" required>
        <label for="doctor_address">Address</label>
        <input type="text" id="doctor_address" name="doctor_address" placeholder="Address..." required>
        <label for="doctor_email">Email</label>
        <input type="email" id="doctor_email" name="doctor_email" placeholder="someone@example.com" required>
        <label for="years_of_exp">Years of experience</label>
        <input type="number" id="years_of_exp" name="years_of_exp" min="0" max="100">
        <label for="doctor_phone">Phone</label>
        <input type="text" id="doctor_phone" name="doctor_phone" list="country-codes" required>
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