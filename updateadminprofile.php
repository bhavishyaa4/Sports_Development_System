<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: first.php");
    exit();
}
$adminId = $_SESSION['admin_id'];

$sql = "SELECT * FROM `admins` WHERE id = $adminId";
$result1 = mysqli_query($con, $sql);

if (!$result1) {
    die("Database query error: " . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result1);

$name = isset($row['name']) ? $row['name'] : '';
$email = isset($row['email']) ? $row['email'] : '';
$role = isset($row['role']) ? $row['role'] : '';

if(isset($_POST['submit'])){
    $newFname = $_POST['name'];
    $newEmail = $_POST['email'];
    $newRole = $_POST['role'];
    $error = array();

    // Check if the provided email already exists for another user
    $sqlCheckEmail = "SELECT * FROM `admins` WHERE email = '$newEmail' AND id != $adminId";
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

    if (empty($newRole)) {
        $error['rrole'] = "Role is required !!";
    }

    if(count($error) == 0){
        // Update the user's data in the database
        $sqlUpdate = "UPDATE `admins` SET email = '$newEmail', name = '$newFname',role = '$newRole' WHERE id = $adminId";

        $resultUpdate = mysqli_query($con, $sqlUpdate);

        if($resultUpdate){
            echo "<script>";
            echo "alert('Profile Updated Successfully');";
            echo "window.location.href = 'userhome.php';";
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
                    <label class="show">Role</label>
                    <input type="text" name="role" id="role" class="role" placeholder="Type Role" value="<?php echo $role; ?>">
                    <p class="require">
                        <?php if (isset($error['rrole'])) { echo $error['rrole']; } ?>
                    </p>
                </div>
                <button type="submit" name="submit" id="submit" class="submit">UPDATE PROFILE</button>
            </form>
        </div>
    </div>
</body>
</html>
