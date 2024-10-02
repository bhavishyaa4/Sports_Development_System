<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header('location:first.php?err=1');
    }
?>