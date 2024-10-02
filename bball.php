<?php
session_start();
if (isset($_POST['deletebtn'])) {
    if (isset($_POST['delete_academy'])) {
        $deletedAcademy = $_POST['delete_academy'];
        if (isset($_SESSION['added_academies'])) {
            foreach ($_SESSION['added_academies'] as $key => $academy) {
                if ($academy['name'] === $deletedAcademy) {
                    unset($_SESSION['added_academies'][$key]);
                    break;
                }
            }
        }
    }
    // Redirect to the same page after deleting the academy
    header("Location: bball.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASKETBALL ACADEMY:</title>
    <style>
                *{
            margin: 0;
            padding: 0;
        }
        body{
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        }
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
.item {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .item .info {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            width: 300px;
            border-radius: 10px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .item .info label {
            font-weight: bold;
        }

        .item .info input[type="text"] {
            margin-top: 10px;
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .item .info select {
            margin-top: 10px;
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .item .info button {
            margin-top: 10px;
            width: 100%;
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        /* * {
            margin: 0;
            padding: 0;
        }

        .container {
            background: linear-gradient(to right, white, #caddeb);
        }

        .header {
            width: 100%;
            height: 90px;
            background-color: grey;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        ul {
            display: flex;
        }

        li {
            margin-left: 20px;
            list-style: none;
        }

        li a {
            text-decoration: none;
            color: black;
        }

        .header #logo {
            top: 20px;
            font-size: 30px;
            z-index: 1;
        }

        .header ul {
            top: 40px;
            font-size: 30px;
        }

        .header ul li {
            padding-left: 20px;
        }

        .header ul li a {
            color: white;
            text-decoration: none;
        }

        .header ul li a:hover {
            color: black;
            font-size: 20px;
        }

        h1 {
            text-align: center;
            font-size: 40px;
            padding-top: 50px;
        }

        .item {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .item .info {
            margin-top: 20px;
            padding: 20px;
            background-color: white;
            width: 300px;
            border-radius: 10px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1);
        }

        .item .info label {
            font-weight: bold;
        }

        .item .info input[type="text"] {
            margin-top: 10px;
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .item .info select {
            margin-top: 10px;
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .item .info button {
            margin-top: 10px;
            width: 100%;
            padding: 8px 16px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .success {
            color: green;
            margin-top: 10px;
        } */
    </style>
</head>
<body>
    <div class="container">
    <div class="header">
            <div id="logo">SportsZen</div>
        <div id="navbar">
            <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="sa.html">Sports Academy</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">About Us</a></li>
            </ul>
        </div>
        <div class="out">
            <button class="logout"><a href="logout.php">LOG-OUT</a></button>
        </div>
        </div>
    </div>
        <h1>BASKETBALL ACADEMY:</h1>
        <div class="item">
            <?php
            if (isset($_SESSION['added_academies']) && !empty($_SESSION['added_academies'])) {
                foreach ($_SESSION['added_academies'] as $academy) {
                    echo '<div class="info">';
                    echo '<label>Name:</label>';
                    echo '<input type="text" value="' . $academy['name'] . '" readonly>';
                    echo '<label>Address:</label>';
                    echo '<input type="text" value="' . $academy['address'] . '" readonly>';
                    echo '<label>Number:</label>';
                    echo '<input type="text" value="' . $academy['number'] . '" readonly>';
                    echo '<button type="submit"><a href="regdetails.php">APPLY</a></button>';
                    echo '</div>';
                }
            } else {
                echo 'No academies added yet.';
            }
            ?>
        </div>
