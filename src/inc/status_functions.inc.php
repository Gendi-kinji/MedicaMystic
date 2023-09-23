<?php
function print_form_status(){
    // Start a session
    session_start();

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
}


?>