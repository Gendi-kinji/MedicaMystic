
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/form_styles/add_patients.css">
    <title>Patients Form</title>
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
    <form class="patient-form" action="../process/process_reg_details/patient-details.process.php" method="POST">
    <!-- In the action attribute, the value passed is the php script which outputs the name of the script
    being run-->
        <header id="patient-form-header">
            <h3 id="patient-form-title">Patient Form</h3>
            <h4>Enter your details below</h4>
        </header>
        <label for="patient_firstname">First Name</label>
        <input type="text" id="patient_firstname" name="patient_firstname" placeholder="First name..." required>
        <label for="patient_surname">Surname</label>
        <input type="text" id="patient_surname" name="patient_surname" placeholder="Surname..." required>
        <label for="patient_dob">Date of Birth</label>
        <input type="date" id="patient_dob" name="patient_dob" required>
        <label for="patient_address">Address</label>
        <input type="text" id="patient_address" name="patient_address" placeholder="Address..." required>
        <label for="patient_email">Email</label>
        <input type="email" id="patient_email" name="patient_email" placeholder="someone@example.com" required>
        <label for="patient_phone">Phone</label>
        <input type="text" id="patient_phone" name="patient_phone" list="country-codes" required>
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
