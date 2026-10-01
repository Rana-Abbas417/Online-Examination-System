<?php

session_start();


// Remove all session variables
session_unset();


// Destroy the session
session_destroy();


// Send user back to the home page
header("Location: ../index.php");

exit();

?>