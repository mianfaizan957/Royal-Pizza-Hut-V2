<?php
session_start();

// agar session chal rahi hai to usko khatam karo
session_unset();
session_destroy();

// login page par redirect
header("Location: login.php");
exit();
?>