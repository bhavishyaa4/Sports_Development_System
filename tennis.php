<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tennis</title>
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
        .tennis{
            width: 100%;
        }
        .tennis img{
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
                    <div class="tennis">
                        <img src="images/Tennispic1.jpg" alt="tennis">
                    </div>
                    <div class="info">
                        <h1>Tennis</h1>
                        <h2>History:</h2>
                        <p>Tennis is played by either two players (one player per side) or by 
                            four players as a game of doubles (two players per side). Tennis is 
                            one of the most played racquet sports in the world that is played on 
                            a variety of surfaces like grass, clay, cement, coated asphalt and carpet.   
                        </p>
                            <p>It is believed to have originated in the 13th century in France where 
                                players used to hit the ball with their hands. The sport is a regular 
                                event at the Summer Olympics since 1988 and consists of other tournaments 
                                like Grand Slam, ATP World Tour, WTA Tour etc. International Tennis Federation 
                                (ITF) is the global governing body of Tennis.</p>
                    </div>
                    <div class="motive">
                        <img src="Images/Tennispic2.jpg" alt="chelsea">
                        <div class="quote">
                            <h1>“Just believe in yourself. Even if you don’t pretend 
                                that you do and, and some point, you will.”</h1>
                            <p>— Venus Williams</p>
                        </div>
                        
                    </div>
                    <div class="emotion">
                        <p>Tennis is not just only a sports its an emotion for alot of people. The game connects many 
                            players and we play the game for the peace of mind as well as for enjoyment. There are alot of 
                            youths looking for better organizations for developing their tennis skills. SportZen is there
                            for you so that you can improve your tennis skills and knowledge. We will guide you to get
                             admission in best sporting facilites where you can improve your skills.</p>
                    </div>
                </div>
                <div class="footer">
                    <!-- <button><a href="bball.html">REGISTER</a></button> -->
                </div>
            </div>
        </body>
        </html>