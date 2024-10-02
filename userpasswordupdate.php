<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['userId'];

$sql = "SELECT * FROM `user_register` WHERE id = $userId";
$result1 = mysqli_query($con, $sql);

if (!$result1) {
    die("Database query error: " . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result1);

$password = isset($row['password']) ? $row['password'] : '';
$cpass = isset($row['confirm_password']) ? $row['confirm_password'] : '';

if(isset($_POST['submit'])){
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    $error = array();

    if (empty($password)) {
        $error['rpassword'] = '*Password is required*';
    }
    if (empty($cpass)) {
        $error['rcpass'] = '*Confirm Password is required*';
    } elseif ($password !== $cpass) {
        $error['rcpass'] = '*Passwords do not match*';
    }

    if(count($error) == 0){
        $sql = "UPDATE `user_register` SET password = '$password' WHERE id = $userId";

        $result = mysqli_query($con, $sql);

        if($result){
            echo "<script>";
            echo "alert('Password Changed Successfully');";
            echo "window.location.href = 'dex.php';";
            echo "</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="userpasswordupdate.css">
    <title>CHANGE PASSWORD:</title>
</head>
<body>
<div class="first">
        <div class="second">
<form class="f-body" name ="form" id="form" method="POST" action="" enctype="multipart/form-data">
<h2>Change Password</h2>
<div class="input">
    <label class="show">New Password</label>
    <input type="password" name="password" id="password" class="password" placeholder="Input New Password" value="">
    <p class="require">
                    <?php
                    if (isset($error['rpassword'])) {
                        echo $error['rpassword'];
                    }
                    ?>
                </p>
                </div>
                <div class="input">
    <label class="show">Confirm New Password</label>
    <input type="password" name="cpass" id="cpass" class="cpass" placeholder="Re-enter New Password" value="">
    <p class="require">
                    <?php
                    if (isset($error['rcpass'])) {
                        echo $error['rcpass'];
                    }
                    ?>
                </p>
                </div>
    <button type="submit" name="submit" id="submit" class="submit">Update Password</button>
</form>
</div>
    </div>
</body>
</html>