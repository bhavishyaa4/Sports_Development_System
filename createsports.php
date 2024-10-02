<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:first.php?err=1');
    }
?>
<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $sportsname = $_POST['sportsname'];
    $error = array();

    if (empty($sportsname)) {
        $error['rsportsname'] = "**Please insert sport **";
    }

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $target_dir = "photos/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_path = $target_file;
    } else {
        $image_path = '';
    }

    if (empty($error) && !empty($sportsname) && !empty($image_path)) {
        $insert = "INSERT INTO sports (name, image) VALUES ('$sportsname', '$image_path')";
        $result = mysqli_query($con, $insert);

        if ($result) {
            echo "<script>";
            echo "alert('Sports Added Successfully');";
            echo "window.location.href = 'createsports.php';";
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
    <title>Adding multiple sports:</title>
    <style>
                       *{
            margin: 0;
            padding: 0;
        }
        .container{
            background: linear-gradient(to right, white,#caddeb);
        }
        .header{
            width: 100%;
            height: 90px;
            background-color: grey;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        ul{
            display: flex;
        }
        li{
            margin-left: auto;
            list-style:none;
        }
        li a{
            text-decoration: none;
            color: black;
        }

.header #logo{
    top: 50px;
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
    margin:0 40px;
}
#navbar ul li a{
    text-decoration: none;
    color: purple;
}
#navbar ul li a:hover{
    color:blue;
}
.info {
    display:grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap:10px;
    height:500px;
    margin: 0 auto;
    margin-top:30px;
    padding: 10px;
    border-radius: 4px;
}
label{
    font-size:20px; 
    color:black;
    font-weight: lighter;
    font-family:Georgia, 'Times New Roman', Times, serif; 
}
.info input[type="text"], .info input[type="file"]{
    margin-top: 10px;
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
    width: 100px;
    margin: 0 auto;
    margin-top: 30px;
    margin-left: 0px;
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
}
h1{
    margin-top:30px;
    margin-bottom:40px;
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    border-width: bold;
    border-style:solid;
    background-color: grey;
    width: 120px;
    z-index: 1;
}
.dropdown-content a {
    color: purple;
    font-weight: bold;
    font-size: large;
    padding: 20px 5px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {
    text-decoration: underline;
}
.dropdown:hover .dropdown-content {
    display: block;
}
.require{
    color: red;
    font-style: italic;
    font-weight: bold;
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
                <li class="dropdown">
                <a href="#" class="dropbtn">Sports</a>
                <div class="dropdown-content">
                <a href="createsports.php">Add New Sport</a>
                <a href="adminSports.php">Delete Sport</a>
            </div>
                <li><a href="addadmin.php">Add Admin</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="logout">Logout/Change Password</button>
            <div class="dropdown-content">
        <a href="logout.php">Logut</a>
        <a href="adminpasswordupdate.php">Change Password</a>
        <a href="updateadminprofile.php">Update Profile</a>
    </div>
        </div>
        </div>
    <h1>ADD SPORTS:</h1>
    <div class="info">
    <form method="post" action="" name="add" enctype="multipart/form-data">
        <label>Sports Name</label>
        <input type="text" name="sportsname" id="sportsname" autocomplete="off">
        <p class="require">
                    <?php
                    if (isset($error['rsportsname'])) {
                        echo $error['rsportsname'];
                    }
                    ?>
                </p>
        <label>Image</label>
        <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png">
        <input type="submit" name="submit" value="Add Sports" class="footer">
    </form>
</div>
</body>
</html>