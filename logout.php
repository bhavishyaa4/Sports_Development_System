<?php
    session_start();
    session_destroy();
    setcookie('admin_id', false, time() - 10 * 24 * 60 * 60);
    setcookie('admin_email', false, time() - 10 * 24 * 60 * 60);
    setcookie('admin_name', false, time() - 10 * 24 * 60 * 60);
    header('location:first.php');
?>