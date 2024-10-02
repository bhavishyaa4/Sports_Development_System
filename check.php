<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:first.php?err=1');
    }
?>