<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOTBALL</title>
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
.main{
    width: 100%;
}
.football{
    width: 100%;
}
.football img{
    width: 100%;
}
.info{
    text-align: justify;
    padding: 20px;
}
.info h1{
    font-size: 50px;
    margin-bottom: 20px;
}
.info h2{
    font-size: 40px;
    margin-bottom: 20px;
}
.info p{
    font-size: 30px;
    margin-bottom: 20px;
}
.motive{
    width: 100%;
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr;
}
.motive img{
    width: 850px;
}
.quote{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
.quote p{
    text-transform: uppercase;
    margin-top: 10px;
    font-size: 20px;
}
.motive h1{
    text-align: center;
    font-style: italic;
}
.emotion{
    text-align: justify;
    margin-top: 10px;
    padding: 20px;
}
.emotion p{
    font-size: 30px;
}
.footer{
    display: flex;
    justify-content:right;
}
.footer button a{
    text-decoration: none;
    color: black;
    font-weight: bold;
    font-size: 30px;
}
.footer button{
    padding: 10px;
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
                <li><a href="#">About Us</a></li>
            </ul>
        </div>
        </div>
        <div class="main">
            <div class="football">
                <img src="./images/foot.webp" alt="football">
            </div>
            <div class="info">
                <h1>Football</h1>
                <h2>History:</h2>
                <p>Football, also called association football or soccer, game in which two teams of 11 players, using any part of 
                    their bodies expect their hands or arms, try to meneuver the ball into the opposing team's goal. Only the goalkeeper
                    is permitted to handle the ball and mmay do so only within the penalty area surrounding the goal. The tea scores more
                    goal wins.</p>
                    <p>Football is the world's most popular ball game in numbers of participants and spectators. Simple in its principal rules
                        and essential equipement, the sport can be played almost anywhere. Football's governing body, the Fédération Internationale 
                        de Football Association (FIFA),
                        estimated that at the turn of the 21st century there were approximately 250 million
                        football players and over 1.3 billion people"intrested" in football; in 2010 a combined
                        television audience of more than 26 billion watched football's premier tournament, the 
                        quadrennial month-long World Cup finals.</p>
            </div>
            <div class="motive">
                <img src="./images/chelsea.webp" alt="chelsea">
                <div class="quote">
                    <h1>"We're all together, and winning is our aim, So cheer us on through the sun and rain, 'cause Chelsea, Chelsea is our name."</h1>
                    <p>- chelsea football club</p>
                </div>
                
            </div>
            <div class="emotion">
                <p>Football is not just only a sports its an emotion for alot of people. The game connects many players and we play the game for the peace of mind as well as for enjoyment. There are alot youths looking for better organizations for developing their football skills. SportZen is there
                for you so that you can improve your football skills and knowledge. We will guide you to get addmission in best sporting facilites where you can improve your skills.</p>
            </div>
        </div>
    </div>
</body>
</html>