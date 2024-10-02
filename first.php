<?php
    if(isset($_COOKIE['admin_id'])){
        session_start();
        $_SESSION['admin_id'] = $_COOKIE['admin_id'];
        $_SESSION['admin_email'] = $_COOKIE['admin_email'];
        $_SESSION['admin_name'] = $_COOKIE['admin_name'];
        header('location:./userhome.php');
    }
    if(isset($_POST['btn'])){
        $err=[];
        if(isset($_POST['email'])&& !empty($_POST['email']) && trim($_POST['email'])){
            $email=$_POST['email'];
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $err['email'] = 'PLEASE ENTER VALID EMAIL!!!';
            }
        }else{
            $err['email'] = 'PLEASE ENTER YOUR EMAIL!!!';
        }
        if(isset($_POST['pass'])&& !empty($_POST['pass']) && trim($_POST['pass'])){
            $password=$_POST['pass'];
            $enctypted_password = md5($password);
        }else{
            $err['pass'] = 'PLEASE ENTER YOUR PASSWORD!!!';
        }
        if(count($err)==0){
            require_once 'connect.php';
            $sql = "SELECT id,name,email from admins WHERE email='$email' AND password='$enctypted_password' AND status=1";
            $result = $con->query($sql);

            if($result -> num_rows == 1){
                $row = $result->fetch_assoc();
                session_start();
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];

                if (isset($_POST['remember'])) {
                    setcookie('admin_id', $row['id'], time() + 10 * 24 * 60 * 60);
                    setcookie('admin_email', $row['email'], time() + 10 * 24 * 60 * 60);
                    setcookie('admin_name', $row['name'], time() + 10 * 24 * 60 * 60);
                }
                header('location:./userhome.php');
            } else {
               $msg = 'RECORD NOT FOUND!';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="first.css">
    <title>ADMIN LOGIN PAGE</title>
</head>
<body>
    <body>
        <h1>WELCOME</h1>
        <h2>ADMIN USER</h2>
        <form action="" method="post" id="form" name="form">
            <div class="info">
            <?php if (isset($msg)) { ?>
            <p class="err_msg"><?php echo $msg; ?></p>
            <?php } ?>
            <?php if (isset($_GET['err']) && $_GET['err'] == 1) { ?>
            <p class="err_msg">LOG-IN TO CONTINUE...</p>
            <?php } ?>
                <label>Email</label>
                <input type="text" name="email" id="email" autocomplete="off" value="<?php echo isset($email)?$email: ''?>"/>
                <?php
                if(isset($err['email'])){ ?>
                <span class="w">
                    <?php 
                        echo $err['email']
                    ?>
                    </span>
               <?php }
                ?>
                <label>Password</label>
                <input type="password" name="pass" id="pass" placeholder="***" value="<?php echo isset($password)?$password: ''?>"/>
                <?php
                if(isset($err['pass'])){ ?>
                <span class="w">
                    <?php 
                        echo $err['pass']
                    ?>
                    </span>
               <?php }
                ?>
                <div class="rem">
                <input type="checkbox" name="remember" id="remember" value="remember"/>
                Remember Me
                </div>
                <!-- <p style="color:white;">Don't have an account??<a href="./userhome.php">Click here to register!!</a></p> -->
                <input type="submit" name="btn" value="SIGN-UP"/>
            </div>
        </form>
    </body>
    </html>  
</body>
</html>