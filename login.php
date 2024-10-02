<?php
include 'connect.php';
$errorMsg = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    if (empty($email)) {
        $errors['email'] = "Email Required";
    }

    if (empty($password)) {
        $errors['password'] = "Password Required";
    }

    if (empty($errors)) {
        // User tries to log in
        $selectUser = "SELECT * FROM `user_register` WHERE `email` = '$email' AND `password` = '$password'";
        $resUser = mysqli_query($con, $selectUser);

        if (!$resUser) {
            die(mysqli_error($con));
        }

        if (mysqli_num_rows($resUser) > 0) {
            $rowUser = mysqli_fetch_assoc($resUser);
            $userId = $rowUser['id'];

            if ($email == $rowUser['email'] && $password == $rowUser['password']) {
                session_start();
                $_SESSION['userId'] = $userId;
                $_SESSION['email'] = $email; // Store email in the session
                $_SESSION['password'] = $password; // Store password in the session

                // Set a cookie to last for 30 days
                $cookie_name = "user";
                $cookie_value = $email; 
                $cookie_expiry = time() + (30 * 24 * 60 * 60); // 30 days

                setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");

                header('Location: dex.php');
                exit();
            }
        } else {
            $errors['login'] = "**Wrong username or password**";
        }
    }
}

if (isset($_GET['err']) && $_GET['err'] == 1) {
    $errorMsg = 'Please login to continue !!!';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>HOME PAGE</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <div id="logo">SportsZen</div>
            <div id="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="viewsa.php">Sports Academy</a></li>
                    <!-- <li><a href="#">Blog</a></li> -->
                    <li><a href="aboutus.php">About Us</a></li>
                </ul>
            </div>
            <div class="out">
                <button class="logout"><a href="login.php">Login/Register</a></button>
            </div>
        </div>
    </div>
    <div class="first">
        <div class="second">
            <form action="" method="POST">
                <h2>LOGIN</h2>
                <div class="error-message">
                    <?php echo $errorMsg; ?>
                </div>
                <div class="input">
                    <input type="email" id="email" name="email" placeholder="Email">
                    <i class='bx bxs-envelope'></i>
                    <span class="error"><?php echo isset($errors['email']) ? $errors['email'] : ''; ?></span>
                </div>
                <div class="input">
                    <input type="password" id="password" name="password" placeholder="Password">
                    <i class='bx bxs-lock-alt'></i>
                    <span class="error"><?php echo isset($errors['password']) ? $errors['password'] : ''; ?></span>
                </div>
                <div class="remember">
                    <label><input type="checkbox">Remember me</label>
                </div>
                <span class="error"><?php echo isset($errors['login']) ? $errors['login'] : ''; ?></span>
                <input type="submit" name="submit" class="submit" value="Login">
                <div class="link">
                    <p1>Still don't have an account?<a href="./ureg.php">Register Here</a></p1>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
