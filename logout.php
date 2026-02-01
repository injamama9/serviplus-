<?php
session_start();
session_unset();
session_destroy();

// Cookies clear karna zaroori hai browser history block karne ke liye
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-3600, '/');
}

header("Location: login.php?message=logout");
exit;
?>