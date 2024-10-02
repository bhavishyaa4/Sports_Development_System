<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:first.php?err=1');
    }
?>
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
    text-decoration: none;
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
.image{
    position:relative;
}
.delete{
    position:absolute;
    border-radius:10px;
    padding:5px 8px;
    border:none;
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
        <div class="box">
            <h1> BROWSE YOUR SPORT!!!</h1>
        </div>
        <div class="sports">
            <?php
            while($row=mysqli_fetch_assoc($result)){
                echo "
                    <div class='each-sport'>
                        <img class='image' src='".$row['image']."' style='height:180px;border-radius:10px;'>
                        <button class='delete'><a href='deleteSports.php?id=".$row['id']."'>Delete</a></button>
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