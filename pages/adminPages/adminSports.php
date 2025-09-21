<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location: ../../first.php?err=1');
}
?>
<?php
include '../../connect.php';
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
    <link rel="stylesheet" href="../../css/adminCss/deleteSport.css">
    <title>SPORTS ACADEMY</title>
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "../../../includes/adminHeader.php" ?>
        <div class="box">
            <h1> BROWSE YOUR SPORT!!!</h1>
        </div>
        <div class="sports">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                    <div class='each-sport'>
                        <img class='image' src='/project_i/" . $row['image'] . "' style='height:180px;border-radius:10px;'>
                        <button class='delete'><a href='deleteSports.php?id=" . $row['id'] . "'>Delete</a></button>
                        <div class='name'>
                            <h1>" . $row['name'] . "</h1>
                            <h2>Start your journey as a " . $row['name'] . " player</h2>
                            <form action='' method='post'>
                            <button><a href='../../sport.php?name=" . $row['name'] . "'>Click to see more</a></button>
                            </form>
                        </div>
                    </div>
                ";
            }
            ?>
        </div>
</body>

</html>