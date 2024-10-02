<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
    exit();
}
$userId = $_SESSION['userId'];

$sql = "SELECT * FROM `user_register` WHERE id = $userId";
$result1 = mysqli_query($con, $sql);

if (!$result1) {
    die("Database query error: " . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result1);

$name = isset($row['name']) ? $row['name'] : '';
$email = isset($row['email']) ? $row['email'] : '';
$number = isset($row['number']) ? $row['number'] : '';
$sports = isset($row['sports']) ? $row['sports'] : '';
$position = isset($row['position']) ? $row['position'] : '';

if(isset($_POST['submit'])){
    $newFname = $_POST['name'];
    $newEmail = $_POST['email'];
    $newNumber = $_POST['number'];
    $newSports = $_POST['sports'];
    $newPosition = $_POST['position'];
    $error = array();

    // Check if the provided email already exists for another user
    $sqlCheckEmail = "SELECT * FROM `user_register` WHERE email = '$newEmail' AND id != $userId";
    $resultCheckEmail = mysqli_query($con, $sqlCheckEmail);

    if (mysqli_num_rows($resultCheckEmail) > 0) {
        $error['remail'] = '*Email already exists*';
    }

    if (empty($newEmail)) {
        $error['email'] = '*Email is required*';
    } elseif (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = '*Invalid email address*';
    }

    if (empty($newFname)) {
        $error['rfname'] = "Name is required !!";
    }

    if (empty($newNumber)) {
        $error['rnumber'] = "Mobile Number is required !!";
    } elseif (!preg_match("/^[0-9]{10}$/", $newNumber)) {
        $error['rnumber'] = "Mobile Number must be a 10-digit number !!";
    }
    if (empty($newSports)) {
        $error['rsports'] = "Sports is required !!";
    }
    if (empty($newPosition)) {
        $error['rposition'] = "Position is required !!";
    }

    if(count($error) == 0){
        // Update the user's data in the database
        $sqlUpdate = "UPDATE `user_register` SET email = '$newEmail', name = '$newFname', number = '$newNumber',sports = '$newSports',position = '$newPosition' WHERE id = $userId";

        $resultUpdate = mysqli_query($con, $sqlUpdate);

        if($resultUpdate){
            echo "<script>";
            echo "alert('Profile Updated Successfully');";
            echo "window.location.href = 'dex.php';";
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
    <link rel="stylesheet" href="new.css">
    <title>UPDATE PROFILE:</title>
</head>
<body>
    <div class="first">
        <div class="second">
            <form class="f-body" name="form" id="form" method="POST" action="" enctype="multipart/form-data">
                <h2>Update Profile</h2>
                <div class="input">
                    <label class="show">Name</label>
                    <input type="text" name="name" id="name" class="name" placeholder="Write New Name" value="<?php echo $name; ?>">
                    <p class="require">
                        <?php if (isset($error['rfname'])) { echo $error['rfname']; } ?>
                    </p>
                </div>
                <div class="input">
                    <label class="show">Email</label>
                    <input type="text" name="email" id="email" class="email" placeholder="Enter your email" value="<?php echo $email; ?>">
                    <p class="require">
                        <?php if (isset($error['remail'])) { echo $error['remail']; } ?>
                    </p>
                </div>
                <div class="input">
                    <label class="show">Number</label>
                    <input type="text" name="number" id="number" class="number" placeholder="Type Number" value="<?php echo $number; ?>">
                    <p class="require">
                        <?php if (isset($error['rnumber'])) { echo $error['rnumber']; } ?>
                    </p>
                </div>
                <div class="input">
                    <label class="show">Sports</label>
                    <input type="text" name="sports" id="sports" class="sports" placeholder="Type Sports" value="<?php echo $sports; ?>">
                    <p class="require">
                        <?php if (isset($error['rsports'])) { echo $error['rsports']; } ?>
                    </p>
                </div>
                <div class="input">
                    <label class="show">Position</label>
                    <input type="text" name="position" id="position" class="position" placeholder="Type Position" value="<?php echo $position; ?>">
                    <p class="require">
                        <?php if (isset($error['rposition'])) { echo $error['rposition']; } ?>
                    </p>
                </div>
                <button type="submit" name="submit" id="submit" class="submit">UPDATE PROFILE</button>
            </form>
        </div>
    </div>
</body>
</html>
