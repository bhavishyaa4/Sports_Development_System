<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:./first.php?err=1');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>HOME PAGE</title>
    <style>
        *{
            margin: 0;
            padding: 0;
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
.content{
    display:flex;
    flex-direction: column;
    padding-left: 1%;
}
.content h1{
    margin-top: 5%;
}
.content p{
    margin-top: 10%;
}
h1{
    text-decoration: underline;
    font-style: italic;
    font-size: 350%;
}
h1:hover{
    color: lime;
    transition: 0.5s;
}
p{
    font-style:italic;
    font-size: 250%;
    font-weight: bold;
}
p:hover{
    color:orange;
    transition: 0.5s;
}
.icon{
    position:fixed;
    top:25%;
    height:400px;
    width:50px;
    margin-left:96%;
    background-color: grey;
    border-radius: 60px 0 0 60px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-direction: column;
}
.icon:hover{
    background-color: black;
}
.icon a{
    color:yellow;
}
.icon a:hover{
    color:red;
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: transparent;
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
        <div class="content">
            <h1>PUSH YOURSELF HARDER <br> WHEN IT HURTS<br> YOU THE MOST.</h1>
            <p>WELCOME TO THE WORLD OF SPORTS!!</p>
        </div>
        <div class="icon">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</body>
</html>