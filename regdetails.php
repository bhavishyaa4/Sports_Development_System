<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $sp = $_POST['sp'];
    $error = array();
    $u = "SELECT email FROM applicant_register WHERE email = '$email'";
    $uu = mysqli_query($con, $u);
    if(empty($fname)){
        $error['rfname'] = "*Username Is Required!!*";
    }
    if(empty($uname)){
        $error['runame'] = "*Username Is Required!!*";
    }
    if(empty($email)){
        $error['remail'] = "*Email Is Required!!*";
    }
    if(empty($category)){
        $error['rcategory'] = "*Category Is Required!!*";
    }
    if(empty($sp)){
        $error['rsports'] = "*Sports Name Is Required!!*";
    }

    if(count($error) == 0){
        $sql = "INSERT INTO `applicant_register` (name, username, email, sports, category) VALUES ('$fname', '$uname', '$email', '$sp', '$category')";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "DATA HAS BEEN INSERTED SUCCESSFULLY..";
            // header('location:show.php');
        }else{
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
    <title>REGISTRATION DETAILS:</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url('./images/background2.jpg');
        background-position: center;
        background-size: cover;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    h1 {
        text-align: center;
        font-size: 45px;
        margin: 12px 0;
        color: yellow;
    }

    .info {
        display: grid;
        grid-template-columns:  1fr 1fr;
        gap: 10px;
        height: 500px;
        margin: 0 auto;
        padding: 25px;
        border-radius: 4px;
    }

    .second,
    .third {
        padding: 0px;
        margin-right: 45px;
    }

    .second label,
    .third label {
        display: grid;
        margin-bottom: 12px;
        font-weight: bold;
        color: ghostwhite;
    }

    .second input[type="text"],
    .second input[type="password"],
    .second select,
    .third select,
    .third input[type="text"],
    .third input[type="number"],
    .third input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid grey;
        border-radius: 5px;
        box-shadow: none;
        font-size: 14px;
        color: black;
        margin-bottom: 10px;
    }

    .footer {
        position: absolute;
        left: 86%;
        bottom: 60px;
        background-color: transparent;
        color: white;
        padding: 10px 20px;
        border: solid;
        border-radius: 5px;
        font-weight: bold;
        font-size: 15px;
        cursor: pointer;
    }

    .require {
        color: red;
    }
</style>
<body>
    <h1>REGISTRATION DETAILS</h1>
    <div class="info">
        <div class="second">
            <form method="post" enctype="multipart/form-data">
                <label>Name</label>
                <input type="text" name="fname" id="fname" placeholder="Aayush" value=""/>
                <p class="require" style="color:red;font-style:italic;font-size:20px;">
                    <?php
                    if(isset($error['rfname'])){
                        echo $error['rfname'];
                    }
                    ?>
                </p>
                <label>Username</label>
                <input type="text" name="uname" id="uname" placeholder="Aayush007" value=""/>
                <p class="require"  style="color:red;font-style:italic;font-size:20px;">
                    <?php
                    if(isset($error['runame'])){
                        echo $error['runame'];
                    }
                    ?>
                </p>
                <label>Category</label>
                <select name="category">  
                    <option value="Coach">Coach</option>
                    <option value="Volunteer">Volunteer</option>
                    <option value="Player">Player</option>
                </select>
                <p class="require">
                    <?php
                    if(isset($error['rcategory'])){
                        echo $error['rcategory'];
                    }
                    ?>
                </p>
        </div>
        <div class="third">
            <label>Email</label>
            <input type="text" name="email" id="email" placeholder="inntaayush@gmail.com" value=""/>
            <p class="require" style="color:red;font-style:italic;font-size:20px;">
                <?php
                if(isset($error['remail'])){
                    echo $error['remail'];
                }
                ?>
            </p>
            <label>Sports</label>
            <input type="text" name="sp" id="sp" placeholder="Enter your sport" value=""/>
            <p class="require" style="color:red;font-style:italic;font-size:20px;">
                <?php
                if(isset($error['rsports'])){
                    echo $error['rsports'];
                }
                ?>
            </p>
        </div>
    </div>
    <button type="submit" name="submit" class="footer">REGISTER</button>
    </form>
</body>
</html>
