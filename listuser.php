<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:first.php?err=1');
    }
?>
<?php
include 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE AND DELETE SITE:</title>
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
.show{
    margin-top: 4%;
    display:flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;

}
.start{
    font-size: 14px;
    height: 30px;
    width: 90px;
    right: 3%;
    display:grid;
    place-items: center;
    background:transparent;
    border-radius: 0px;
    font-weight: bold;
    margin-bottom: 1.5%;
} 

.start:hover{
    background-color: lime;
}
.start a{
    color:black;
    text-decoration: none;
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
    <div class="show">
        <button type="submit" class="start"><a href="./ureg.php">Add User</a> </button>
        <table border="1" cellspacing="0">
            <thead>
            <tr style="font-weight: bold;">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Number</th>
                <th>Sports</th>
                <th>Position</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `user_register`";
            $result1 = mysqli_query($con,$sql);
            if($result1){
               while($row = mysqli_fetch_assoc($result1)){
                $id = $row['id'];
                $uname = $row['name'];
                $email = $row['email'];
                $gender = $row['gender'];
                $mobile = $row['number'];
                $sports = $row['sports'];
                $position = $row['position'];
                echo '
                <tr>
                <td>'.$id.'</td>
                <td>'.$uname.'</td>
                <td>'.$email.'</td>
                <td>'.$gender.'</td>
                <td>'.$mobile.'</td>
                <td>'.$sports.'</td>
                <td>'.$position.'</td>
                <td>
                <button class="update"><a href ="listuserupdate.php?updateid='.$id.'">Update</a></button>
                <button class="delete"><a href ="listuserdelete.php?deleteid='.$id.'">Delete</a></button>
                </td>
            </tr>';
               } 
            }?>
        </tbody>
    </table>
        </div>
</body>
</html>