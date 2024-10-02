<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `user_register` WHERE id = $id";
$result2 = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result2);
$name = $row['name'];
$email = $row['email'];
$sports = $row['sports'];
$position = $row['position'];
$number = $row['number'];

if(isset($_POST['savebtn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $sports = $_POST['sports'];
    $position = $_POST['position'];
    $number = $_POST['number'];
    $error = array();
    if(empty($name)){
        $error['rname'] = "*Name Is Required!!*";
    }
    if(empty($email)){
        $error['remail'] = "*Email Is Required!!*";
    }
    if(empty($sports)){
        $error['rsport'] = "*Sport Is Required!!*";
    }
    if(empty($position)){
        $error['rposition'] = "*Position Is Required!!*";
    }
    if(empty($number)){
        $error['rnumber'] = "*Number Name Is Required!!*";
    }
    if(count($error) == 0){
        $sql = "UPDATE `user_register` SET id = $id, name = '$name', email = '$email', sports = '$sports', position = '$position', number = '$number' WHERE id = $id";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "<script>";
            echo "alert('Updated Successfully');";
            echo "window.location.href = 'listuser.php';";
            echo "</script>";
        }
        else {
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
    <title>Admin Update Page:</title>
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
                <input type="text" name="email" id="email" autocomplete="off" placeholder="Enter your email" value="<?php echo $email;?>"/>
                <p class="require">
                    <?php
                    if (isset($error['remail'])) {
                        echo $error['remail'];
                    }
                    ?>
                </p>
                <label>Sports</label>
                <input type="text" class="sports" id="sports" name="sports" autocomplete="off" placeholder="Enter sports" value="<?php echo $sports;?>"/>
                <p class="require">
                    <?php
                    if (isset($error['rsport'])) {
                        echo $error['rsport'];
                    }
                    ?>
                </p>
                <label class="num">Number</label>
                <input type="text" name="number" class="number" id="number" autocomplete="off" placeholder="Enter your number"  value="<?php echo $number;?>"/>
                <p class="require">
                    <?php
                    if (isset($error['rnumber'])) {
                        echo $error['rnumber'];
                    }
                      ?>
                    </p>
            </div>
            <div class="third">
                <label>Name</label>
                <input type="text" name="name" id="name" autocomplete="off" placeholder="Enter your name" value="<?php echo $name;?>"/>
                <p class="require">
                    <?php
                    if (isset($error['rname'])) {
                        echo $error['rname'];
                    }
                    ?>
                </p>
                <label>Position</label>
                <input type="text" name="position" id="position" autocomplete="off" placeholder="Enter your name" value="<?php echo $position;?>"/>
                <p class="require">
                    <?php
                    if (isset($error['rposition'])) {
                        echo $error['rposition'];
                    }
                    ?>
                </p>
                </div>
            </div>
        </div>
        <button class="footer" name="savebtn">UPDATE</button>
    </form>
</body>
</html>
