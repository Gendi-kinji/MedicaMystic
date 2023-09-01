<?php
// LOG OUT
// Resume, unset variables and destroy
session_start();
session_unset();
session_destroy();

// Go to homepage
header('Location: home.php?msg=logout');
?>