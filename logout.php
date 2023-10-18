<?php
session_start();
unset($_SESSION['fullname']);
session_destroy();

header("Location: sign-in.php");
exit;
?>