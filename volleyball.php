<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Volleyball</title>
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
        .volleyball{
            width: 100%;
        }
        .volleyball img{
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
                    <div class="Volleyball">
                        <img src="images/volleyballpic2.jpg" alt="Volleyball">
                    </div>
                    <div class="info">
                        <h1>Volleyball</h1>
                        <h2>History:</h2>
                        <p>Volleyball is a high-energy team sport played by two teams of six players separated by a net. 
                            There are teams on either side of the net. One team hits the ball over the net line and into 
                            the other team’s court or area, the other team must then hit the ball back over the net and in 
                            bounds within three tries without letting the ball contact the floor. They are indoor and beach 
                            volleyball and both are sports that are a part of the Olympics games and have competitive leagues.
                        </p>
                            <p>William Morgan invented the game of Volleyball in 1885. He was an athletic director at the YMCA 
                                and was trying to emulate basketball and came up with volleyball. Since then, the rules have 
                                changed here and there, but it quickly became a popular sport at the YMCA. </p>
                    </div>
                    <div class="motive">
                        <img src="images/volleyballpic1.jpg" alt="chelsea">
                        <div class="quote">
                            <h1>“Focus all your effort on what is in your power to control.”</h1>
                            <p>– John Wooden</p>
                        </div>
                        
                    </div>
                    <div class="emotion">
                        <p>Volleyball is not just only a sports its an emotion for alot of people. The game connects many 
                            players and we play the game for the peace of mind as well as for enjoyment. There are alot of 
                            youths looking for better organizations for developing their volleyball skills. SportZen is there
                            for you so that you can improve your volleyball skills and knowledge. We will guide you to get
                             admission in best sporting facilites where you can improve your skills.</p>
                    </div>
                </div>
                <div class="footer">
                    <!-- <button><a href="bball.html">REGISTER</a></button> -->
                </div>
            </div>
        </body>
        </html>