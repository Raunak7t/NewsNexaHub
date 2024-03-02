<?php
session_start();

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page after logout
header("Location: ../index.html");
exit;
?>