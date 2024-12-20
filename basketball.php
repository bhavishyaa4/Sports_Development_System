<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>BASKETBALL</title>
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
        .basketball{
            width: 100%;
        }
        .basketball img{
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
                    <div class="basketball">
                        <img src="./images/basketball2.jpg" alt="football">
                    </div>
                    <div class="info">
                        <h1>Basketball</h1>
                        <h2>History:</h2>
                        <p>Basketball is a team sport in which two teams, most commonly of five players, each opposing one 
                            another on a rectangular court, compete with the primary objective of shooting a basketball . The 
                            team with most points at the end of the game wins, but if regualtion play expires with the score tied,
                            an additional period of play(overtime) is mandated.</p>
                            <p>Invented in 1891, by Canadian-American gym teacher James Naismith in Springfield, Massachusetts, in the 
                                United States, basketball has evolved to become on of the world's most popular and widely viewed sports. 
                                The National Basketball Association (NBA) is the most significant professional basketball league in 
                                terms of popularity, salaries, talent and level of competition (drawing most of its talent from U.S college
                                basketball).</p>
                    </div>
                    <div class="motive">
                        <img src="./images/Basketball.jpg" alt="chelsea">
                        <div class="quote">
                            <h1>"If you don't fall how are you going to know what getting is up like?"</h1>
                            <p>- Wardell Stephen Curry II</p>
                        </div>
                        
                    </div>
                    <div class="emotion">
                        <p>Basketball is not just only a sports its an emotion for alot of people. The game connects many 
                            players and we play the game for the peace of mind as well as for enjoyment. There are alot of 
                            youths looking for better organizations for developing their basketball skills. SportZen is there
                            for you so that you can improve your basketball skills and knowledge. We will guide you to get
                             addmission in best sporting facilites where you can improve your skills.</p>
                    </div>
                </div>
                <div class="footer">
                    <!-- <button><a href="bball.php">REGISTER</a></button> -->
                </div>
            </div>
        </body>
        </html>