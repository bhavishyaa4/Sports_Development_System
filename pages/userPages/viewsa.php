<?php
include __DIR__ . '/../../connect.php';
?>
<?php
$select = "SELECT * FROM sports";
$result = mysqli_query($con, $select);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../images/new_logo.png">
    <title>SPORTS ACADEMY</title>
    <style>
        h1 {
            margin-top: 20px;
            margin-bottom: 50px;
            text-align: center;
        }

        .show {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            font-size: 30px;
        }

        .img {
            margin-right: 10%;
            margin-left: -58%;
            margin-bottom: 10%;
            margin-top: 10%;
        }

        .sports {
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

        .each-sport {
            display: flex;
            column-gap: 30px;
        }

        .name h1 {
            text-align: left;
            margin: 0;
            margin-bottom: 15px;
        }

        .name button {
            font-size: 15px;
            padding: 5px 10px;
            margin-top: 15px;
            background: none;
            border-radius: 5% 20% 5% 20%;
            cursor: pointer;
        }

        .name button a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include __DIR__ . "../../../includes/openHeader.php";
        ?>
        <div class="box">
            <h1> BROWSE YOUR SPORT!!!</h1>
        </div>
        <div class="sports">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                    <div class='each-sport'>
                        <img src='/project_i/" . $row['image'] . "' style='height:180px;border-radius:10px;'>
                        <div class='name'>
                            <h1>" . $row['name'] . "</h1>
                            <h2>Start your journey as a " . $row['name'] . " player</h2>
                            <form action='' method='post'>
                            <button> <a  href='sport.php?name=" . $row['name'] . "'>Click to see more</a></button>
                            </form>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>
</body>

</html>