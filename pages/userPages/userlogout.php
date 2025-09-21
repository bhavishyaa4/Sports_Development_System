<?php
$cookie_name = "user";
setcookie($cookie_name, "", time() - 1, "/");

session_start();
unset($_SESSION['userId']);
session_destroy();
header('location: ../../index.php');
