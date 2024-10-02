<?php
  $cookie_name = "user"; // Define the cookie name
  setcookie($cookie_name, "", time() - 1, "/"); // Expire the cookie

  // Unset and destroy the session
  session_start();
  unset($_SESSION['userId']);
  session_destroy();
  header('location:index.php');
?>
