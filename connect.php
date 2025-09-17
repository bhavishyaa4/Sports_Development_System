<?php
$servername = "localhost";
$username = "root";
$password = "";
$port = 3309;
$dbname = "db_sportsmanagement";

$con = mysqli_connect($servername, $username, $password, $dbname, $port);
if (!$con) {
    die(mysqli_error($con));
}
