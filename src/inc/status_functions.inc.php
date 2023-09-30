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
        unset($_SESSION['success']);
    }
}

function print_login_status(){
    // showing error messages
    session_start();
    if (isset($_SESSION['error'])) {
        echo '<p id="error_msg">Error: ' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    } else if(isset($_SESSION['success'])){
        if($_SESSION['success']===true){
            echo '<p id="success_msg">Registration successful</p>';
        }
        unset($_SESSION['success']);
    }
}


?>