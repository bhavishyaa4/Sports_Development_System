<?php
if(isset($_GET['name'])){
    $name = $_GET['name'];
    $url = "$name.php";
    header('Location: ' . $url);
}
?>