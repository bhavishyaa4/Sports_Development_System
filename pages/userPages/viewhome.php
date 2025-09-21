<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/new_logo.png">
    <link rel="stylesheet" href=".css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>HOME PAGE</title>
    <style>
        .content {
            display: flex;
            flex-direction: column;
            padding-left: 1%;
        }

        .content h1 {
            margin-top: 5%;
        }

        .content p {
            margin-top: 10%;
        }

        h1 {
            text-decoration: underline;
            font-style: italic;
            font-size: 350%;
        }

        h1:hover {
            color: lime;
            transition: 0.5s;
        }

        p {
            font-style: italic;
            font-size: 250%;
            font-weight: bold;
        }

        p:hover {
            color: orange;
            transition: 0.5s;
        }

        .icon {
            position: fixed;
            top: 25%;
            height: 400px;
            width: 50px;
            margin-left: 96%;
            background-color: grey;
            border-radius: 60px 0 0 60px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-direction: column;
        }

        .icon:hover {
            background-color: black;
        }

        .icon a {
            color: yellow;
        }

        .icon a:hover {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include __DIR__ . '../../../includes/openHeader.php';
        ?>
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