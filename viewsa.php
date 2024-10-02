<?php
include 'connect.php';
?>
<?php
$select = "SELECT * FROM sports";
$result = mysqli_query($con,$select);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPORTS ACADEMY</title>
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
    margin:0 40px;
}
#navbar ul li a{
    text-decoration: none;s
    color: purple;
}
#navbar ul li a:hover{
    color:blue;
}
h1{
  margin-top: 20px;
  margin-bottom: 50px;
  text-align:center;
}
.show{
  display:grid;
  grid-template-columns: 1fr 1fr 1fr 1fr;
  font-size: 30px;
}
.img{
    margin-right: 10%;
    margin-left: -58%;
    margin-bottom: 10%;
    margin-top: 10%;
}
.sports{
    width: 70%;
    display: grid;
    margin: auto;
    padding: 30px;
    border: 2px solid black;
    border-radius: 30px;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr 1fr;
    column-gap: 20px;
    row-gap: 60px;
    
}
.each-sport{
    display:flex;
    column-gap:30px;
}
.name h1{
    text-align:left;
    margin:0;
    margin-bottom:15px;
}
.name button{
    font-size: 15px;
    padding: 5px 10px;
    margin-top: 15px;
    background: none;
    border-radius: 5% 20% 5% 20%;
    cursor: pointer;
}
.name button a{
    color:black;
    text-decoration:none;
}
  </style>
</head>
<body>
<div class="container">
        <div class="header">
            <div id="logo">SportsZen</div>
        <div id="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="viewsa.php">Sports Academy</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        </div>
        <div class="out">
        <button class="logout"><a href="login.php">Login/Register</a></button>
        </div>
        </div>
        <div class="box">
            <h1> BROWSE YOUR SPORT!!!</h1>
        </div>
        <div class="sports">
            <?php
            while($row=mysqli_fetch_assoc($result)){
                echo "
                    <div class='each-sport'>
                        <img src='".$row['image']."' style='height:180px;border-radius:10px;'>
                        <div class='name'>
                            <h1>".$row['name']."</h1>
                            <h2>Start your journey as a ".$row['name']." player</h2>
                            <form action='' method='post'>
                            <button><a href='Sport.php?name=".$row['name']."'>Click to see more</a></button>
                            </form>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>
</body>
</html>