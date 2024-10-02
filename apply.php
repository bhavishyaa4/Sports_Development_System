<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location: ./login.php?err=1');
}
?>
<?php
include 'connect.php';

$userId = $_SESSION['userId'];
// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
// }

$position = ''; // Initialize $position variable

if (isset($_POST['submit'])) {
    $sport = $_POST['sport'];
    $academy = $sport . " Academy";
    $position = $_POST['position'];
    $error = array();

    if (empty($sport)) {
        $error['rsport'] = "Select Sports !!";
    }
    if (empty($academy)) {
        $error['racademy'] = "Select Academy !!";
    }
    if (empty($position)) {
        $error['rposition'] = "Select position !!";
    }

    if (count($error) == 0) {

        $sql = "UPDATE `user_register` SET `sports` = '$sport', `academy` = '$academy', `position` = '$position' WHERE `id` = '$userId'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>";
            echo "alert('Applied Successfully');";
            echo "window.location.href = 'apply.php';";
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
    <link rel="stylesheet" href="apply.css">
    <title>Apply Form:</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div id="logo">SportsZen</div>
            <div id="navbar">
                <ul>
                    <li><a href="dex.php">Home</a></li>
                    <li><a href="sa.php">Sports Academy</a></li>
                    <li><a href="apply.php">Apply</a></li>
                    <li><a href="allaboutus.php">About Us</a></li>
                </ul>
            </div>
            <div class="dropdown">
                <button class="logout">Logout/Change Password</button>
                <div class="dropdown-content">
                    <a href="userlogout.php">Logut</a>
                    <a href="userpasswordupdate.php">Change Password</a>
                    <a href="updateprofile.php">Update Profile</a>
                </div>
            </div>
        </div>
    </div>
    <div class="first">
        <div class="second">
            <form action="" method="POST">
                <h2>Select Your Category:</h2>
                <div class="input">
                    <label>Sports:</label>
                    <select id="sport" name="sport" class="sport">
                        <?php
                        $select = "Select * from `sports`";
                        $res = mysqli_query($con, $select);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $selected = ($row['name'] == $sport) ? 'selected' : '';
                            echo "<option value='" . $row['name'] . "' $selected>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <p class="require">
                        <?php
                        if (isset($error['rsport'])) {
                            echo $error['rsport'];
                        }
                        ?>
                    </p>
                </div>
                <div class="input">
                    <label>Academy:</label>
                    <select id="academy" name="academy" class="academy">
                        <?php
                        $select = "Select * from `academy`";
                        $res = mysqli_query($con, $select);
                        while ($row = mysqli_fetch_assoc($res)) {
                            $selected = ($row['name'] == $academy) ? 'selected' : '';
                            echo "<option value='" . $row['name'] . "' $selected>" . $row['name'] . "</option>";
                        }
                        ?>
                    </select>
                    <p class="require">
                        <?php
                        if (isset($error['racademy'])) {
                            echo $error['racademy'];
                        }
                        ?>
                    </p>
                </div>
                <div class="input">
                    <label>Position:</label>
                    <select id="position" name="position" class="position">
                        <option value="coach" <?php if ($position === 'coach') echo 'selected'; ?>>Coach</option>
                        <option value="player" <?php if ($position === 'player') echo 'selected'; ?>>Player</option>
                        <option value="volunteer" <?php if ($position === 'volunteer') echo 'selected'; ?>>Volunteer</option>
                    </select>
                    <p class="require">
                        <?php
                        if (isset($error['rposition'])) {
                            echo $error['rposition'];
                        }
                        ?>
                    </p>
                </div>
                <input type="submit" name="submit" class="submit" value="Apply">
            </form>
        </div>
    </div>
</body>

</html>
