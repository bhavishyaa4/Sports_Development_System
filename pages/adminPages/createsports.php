<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location:../../first.php?err=1');
}
?>
<?php
include '../../connect.php';

if (isset($_POST['submit'])) {
    $sportsname = $_POST['sportsname'];
    $error = array();

    if (empty($sportsname)) {
        $error['rsportsname'] = "**Please insert sport **";
    }

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
        $target_dir = "photos/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image_path = $target_file;
    } else {
        $image_path = '';
    }

    if (empty($error) && !empty($sportsname) && !empty($image_path)) {
        $insert = "INSERT INTO sports (name, image) VALUES ('$sportsname', '$image_path')";
        $result = mysqli_query($con, $insert);

        if ($result) {
            echo "<script>";
            echo "alert('Sports Added Successfully');";
            echo "window.location.href = 'createsports.php';";
            echo "</script>";
        } else {
            die(mysqli_error($con));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../images/new_logo.png">
    <link rel="stylesheet" href="../../css/adminCss/addSport.css">
    <title>Admin | Add Sport</title>
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "../../../includes/adminHeader.php" ?>
        <h1>ADD SPORTS:</h1>
        <div class="info">
            <form method="post" action="" name="add" enctype="multipart/form-data">
                <label>Sports Name</label>
                <input type="text" name="sportsname" id="sportsname" autocomplete="off">
                <p class="require">
                    <?php
                    if (isset($error['rsportsname'])) {
                        echo $error['rsportsname'];
                    }
                    ?>
                </p>
                <label>Image</label>
                <input type="file" name="image" id="image" accept="image/jpeg, image/jpg, image/png">
                <input type="submit" name="submit" value="Add Sports" class="footer">
            </form>
        </div>
</body>

</html>