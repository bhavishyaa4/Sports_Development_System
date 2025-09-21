<?php
if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $url = "/project_i/pages/userPages/$name.php";
    header('Location: ' . $url);
}
