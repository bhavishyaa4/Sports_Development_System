<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `academy` WHERE id = $id";
$result2 = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result2);
$name1 = $row['name'];
$status1 = $row['status'];
$address1 = $row['address'];
$number1 = $row['number'];

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $status = $_POST['status'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $error = array();
    if(empty($name)){
        $error['rname'] = "*Username Is Required!!*";
    }
    if(empty($status)){
        $error['rstatus'] = "*Status Is Required!!*";
    }
    if(empty($address)){
        $error['raddress'] = "*Address Is Required!!*";
    }
    if(empty($number)){
        $error['rnumber'] = "*Number Is Required!!*";
    }
    if(count($error) == 0){
        $sql = "UPDATE `academy` SET id = $id, name = '$name', status = '$status', address = '$address', number = '$number' WHERE id = $id";
        $result = mysqli_query($con, $sql);
        if($result){
            // header('location:display.php'); 
            echo "<script>";
            echo "alert('Academy Updated Successfully');";
            echo "window.location.href = 'listsports.php';";
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
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        /* body{
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        } */
        .header{
            width: 100%;
            height: 90px;
            background-color: grey;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        ul{
            display: flex;
        }
        li{
            margin-left: 20px;
            list-style: none;
        }
        li a{
            text-decoration: none;
            color: black;
        }

        .header #logo{
        top: 20px;
        font-size: 30px;
        z-index: 997;
        font-weight: bold;
        color: yellow;
        margin-left: 20px;
        }
    .logout{
    margin-right: 20px;
    }
    .logout{
    height: 50px;
    width: 120px;
    top: 20px;
    right: 3%;
    display:grid;
    place-items: center;
    background:lime;
    border-radius: 1px 30px;
    font-weight: bold;
}
.logout:hover{
    background-color: orangered;
}
.logout a{
    color:black;
}
#navbar ul :not(:last-child) a:hover,
#navbar ul :not(:last-child) a:focus{
    border-bottom:2px solid white;
    border-radius: 1px 11px;
}
#navbar ul li{
    font-size: 22px;
    font-weight:    bold;
    margin: 0 40px;
}
#navbar ul li a{
    text-decoration: none;
    color: purple;
}
#navbar ul li a:hover{
    color:blue;
}
.info{
    display:flex;
    flex-direction: column;
    width:350px;
    margin-top: 10px;
    box-shadow: 100px solid green;
}
label{
    font-size:20px; 
    color:black;
    font-weight: lighter;
    margin-bottom:2%;
    font-family:Georgia, 'Times New Roman', Times, serif; 
}
.info input[type="text"], .info input[type="password"]{
    margin-top: 10px;
    width: 100%;
    padding: 10px;
    border: 1px solid grey;
    border-radius: 5px;
    box-shadow: none;
    font-size: 14px;
    color: black;
    margin-bottom: 20px;
}
.rem{
    margin-top: 5%;
    margin-bottom:5%;
    color:black;
    font-size: 20px;
}
.info input[type="radio"]{
    width:10%;
}
.info input[type="submit"]{
    width: 50%;
    margin-left: 25%;
    color: rgba(2, 82, 255, 0.925);
    padding: 10px 20px;
    border: solid;
    border-radius: 5px;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
}
.first{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 40vh;
}
.second{
    width: 400px;
    background:transparent;
    border: 3px solid black;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 15px black;
    color:whitesmoke;
    border-radius: 11px;
    padding: 17px 25px;
}
h1{
    text-align: center;
    margin-top: 30px;
    margin-bottom: 50px;
}
.footer{
    margin-top: 2%;
    margin-left: 155px;
    font-size: 13px;
    font-weight: bold;
    border-radius: 10px 0 10px 0;
    margin-bottom: 3px;  
    width: 80px;
    height:30px;
    place-items: center;
    background-color: transparent;
    cursor: pointer;
}
.footer:hover{
    background-color: lime;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div id="logo">SportsZen</div>
            <div id="navbar">
                <ul>
                    <li><a href="userhome.php">Home</a></li>
                    <li><a href="addsports.php">Add Sports Academy</a></li>
                    <li><a href="listsports.php">List Sports Academy</a></li>
                    <li><a href="listuser.php">List Users</a></li>
                    <li><a href="applicant.php">List Applicant</a></li>
                </ul>
            </div>
            <div class="out">
                <button class="logout"><a href="logout.php">LOG-OUT</a></button>
            </div>
        </div>
    </div>
    <h1> UPDATE SPORTS ACADEMY:</h1>
    <div class="first">
    <div class="second">
    <form action="" method="post" id="form" name="form" onsubmit="return validateForm()">
        <div class="info">
            <label>Academy Name</label>
            <input type="text" name="name" id="name" placeholder="" value="<?php echo $name1; ?>">
            <p class="require" style="color:red;font-style:italic;font-size:20px;">
                <?php
                if(isset($error['rname'])){
                    echo $error['rname'];
                }
                ?>
            </p>
            <label>Academy Address</label>
            <input type="text" name="address" id="address" placeholder="" value="<?php echo $address1; ?>">
            <p class="require" style="color:red;font-style:italic;font-size:20px;">
                <?php
                if(isset($error['raddress'])){
                    echo $error['raddress'];
                }
                ?>
            </p>
            <label>Academy Number</label>
            <input type="text" name="number" id="number" placeholder="" value="<?php echo $number1; ?>">
            <p class="require" style="color:red;font-style:italic;font-size:20px;">
                <?php
                if(isset($error['rnumber'])){
                    echo $error['rnumber'];
                }
                ?>
            </p>
            <div class="rem">
                <label>Status:</label>
                <input type="radio" name="status" value="1" <?php if($status1 == 1) echo "checked"; ?>> Active
                <input type="radio" name="status" value="0" <?php if($status1 == 0) echo "checked"; ?>> De Active
            </div>
        </div>
        <button type="submit" name="submit" class="footer">UPDATE</button>
    </form>
            </div>
            </div>
    <script>
        // Function to validate the academy name
        function validateName() {
            var nameInput = document.getElementById("name");
            var name = nameInput.value.trim();
            var regex = /^[A-Za-z\s]+$/; // Only alphabets and spaces allowed

            if (!regex.test(name)) {
                alert("Invalid academy name. Only alphabets and spaces are allowed.");
                nameInput.focus();
                return false;
            }

            return true;
        }

        // Function to validate the phone number
        function validatePhoneNumber() {
            var numberInput = document.getElementById("number");
            var number = numberInput.value.trim();
            var regex = /^[0-9]{10}$/; // 10 digits only

            if (!regex.test(number)) {
                alert("Invalid phone number. Please enter a 10-digit number without letters or symbols.");
                numberInput.focus();
                return false;
            }

            return true;
        }

        // Function to validate the form on submit
        function validateForm() {
            if (!validateName() || !validatePhoneNumber()) {
                return false;
            }

            return true;
        }
    </script>
</body>
</html>

