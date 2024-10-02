<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Sports Development System</title>
    <style>

        header {
            /* background-color: #333; */
            color: black;
            padding: 1em;
            text-align: center;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            line-height: 1.6;
            color: #666;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
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
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    border-width: bold;
    background-color: transparent;
    width: 120px;
    border-radius: 20px 1px;
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
    <header>
        <h1>Sports Development System</h1>
    </header>

    <section>
        <h2>About Us</h2>
        <p>Welcome to the Sports Development System, where we are committed to fostering growth and excellence in
            sports. Our system is designed to provide a platform for athletes, coaches, and sports enthusiasts to
            thrive and achieve their full potential.</p>

        <p>At Sports Development System, we believe in the power of sports to inspire, unite, and transform lives. Our
            mission is to contribute to the development of a healthier and more active community by supporting and
            promoting sports at all levels.</p>

        <h2>Our Vision</h2>
        <p>To be a leading force in sports development, empowering individuals to embrace a healthy and active
            lifestyle through the pursuit of excellence in sports.</p>

        <h2>Our Values</h2>
        <ul>
            <li>Excellence</li>
            <li>Teamwork</li>
            <li>Integrity</li>
            <li>Inclusivity</li>
            <li>Continuous Improvement</li>
        </ul>
    </section>

    <footer>
        <p>&copy; 2023 Sports Development System. All rights reserved.</p>
    </footer>
</body>

</html>
