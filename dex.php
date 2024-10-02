<?php
    session_start();
    if(!isset($_SESSION['userId'])){
        header('location: ./login.php?err=1');
    }
?>
<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>HOME PAGE</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        /* .container{
            background: linear-gradient(to right, white,#caddeb);
        } */
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
    cursor: pointer;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div id="logo">SportsZen</div>
        <div id="navbar">
            <ul>
                <li><a href="dex.php">Home</a></li>
                <li><a href="sa.php">Sports Academy</a></li>
                <li><a href="apply.php">Apply</a></li>
                <li><a href="allaboutus.php">About Us</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="logout">Logout/Change Password</button>
            <div class="dropdown-content">
        <a href="userlogout.php">Logut</a>
        <a href="userpasswordupdate.php">Change Password</a>
        <a href="updateprofile.php">Update Profile</a>
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
