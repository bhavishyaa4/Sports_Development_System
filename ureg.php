<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    $gender = $_POST['gender'];
    $fname = $_POST['fname'];
    $mobile = $_POST['mobile'];
    $image = $_FILES['image']["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], "doc/".$image);
    $error = array();

    // Check if the email already exists in the database
    $check_email_query = "SELECT * FROM user_register WHERE email = ?";
    $stmt = $con->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $error['remail'] = '*Email already exists*';
    }
    if (empty($email)) {
        $err['email'] = '*Email is required*';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = '*Invalid email address*';
    }
    if (empty($password)) {
        $error['rpassword'] = "Password is required !!";
    }
    if (empty($cpass)) {
        $error['rcpass'] = "Confirm Password is required !!";
    }
    if ($password !== $cpass) {
        $error['rpassword'] = "Passwords do not match !!";
        $error['rcpass'] = "Passwords do not match !!";
    }
    if (empty($fname)) {
        $error['rname'] = "Name is required !!";
    }
    if (empty($mobile)) {
        $error['rmobile'] = "Mobile Number is required !!";
    } elseif (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $error['rmobile'] = "Mobile Number must be a 10-digit Nepali number !!";
    }
    if (count($error) == 0) {
        $sql = "INSERT INTO `user_register` (name, email, gender, image, number, password) VALUES ('$fname','$email', '$gender', '$image', '$mobile', '$password')";
        $result = mysqli_query($con, $sql);

        if ($result) {  
            echo "<script>";
            echo "alert('User Added Successfully');";
            echo "window.location.href = 'login.php';";
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
    <title>REGISTER PAGE:</title>
    <link rel="stylesheet" href="ureg.css">
</head>
<body>
    <form class="f-body" name="form" id="form" method="post" action="" enctype="multipart/form-data">
        <h1 style="text-align: center;">REGISTER</h1>
        <div class="info">
            <div class="first">
                <h2 style="font-size: 33px;color:rgb(255, 0, 255);">SportZen</h2>
                <h3 style="padding:0px;margin-left: 15px; margin-top: 30px; color:yellow">ENHANCE</h3>
                <h3 style="padding:0px;margin-left: 30px;color:orange;">AND</h3>
                <h3 style="padding:0px;margin-left: 45px;color:yellow;">DEVELOP</h3>
            </div>
            <div class="full">
            <div class="second">
                <label>Email</label>
                <input type="text" name="email" id="email" autocomplete="off" placeholder="Enter your email" value=""/>
                <p class="require">
                    <?php
                    if (isset($error['remail'])) {
                        echo $error['remail'];
                    }
                    ?>
                </p>
                <label>Password</label>
                <input type="password" class="password" id="password" name="password" autocomplete="off" placeholder="****" value=""/>
                <p class="require">
                    <?php
                    if (isset($error['rpassword'])) {
                        echo $error['rpassword'];
                    }
                    ?>
                </p>
                <label>Gender</label>
                <select name="gender">
                    <option value="select">Select</option>
                    <option value="male">MALE</option>
                    <option value="female">FEMALE</option>
                    <option value="others">OTHERS</option>
                </select>

                <label class="img">Image</label>
                <input type="file" id="image" name="image" accept="doc/*">

            </div>
            <div class="third">
                <label>Name</label>
                <input type="text" name="fname" id="fname" autocomplete="off" placeholder="Enter your name" value=""/>
                <p class="require">
                    <?php
                    if (isset($error['rname'])) {
                        echo $error['rname'];
                    }
                    ?>
                </p>
                <label>C.Password</label>
                <input type="password" name="cpass" id="cpass" autocomplete="off" placeholder="***" value=""/>
                <p class="require">
                    <?php
                    if (isset($error['rcpass'])) {
                        echo $error['rcpass'];
                    }
                    ?>
                </p>

                <label class="num">Number</label>
                <input type="text" name="mobile" class="num" id="mobile" autocomplete="off" placeholder="Enter your number"  value=""/>
                <p class="require">
                    <?php
                    if (isset($error['rmobile'])) {
                        echo $error['rmobile'];
                    }
                      ?>
                    </p>
                </div>
            </div>
        </div>
        <button class="footer" name="submit">SIGN-UP</button>
    </form>
</body>
</html>
