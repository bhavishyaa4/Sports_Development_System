<?php
include '../../connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `academy` WHERE id = $id";
$result2 = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result2);
$name1 = $row['name'];
$status1 = $row['status'];
$address1 = $row['address'];
$number1 = $row['number'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $error = array();
    if (empty($name)) {
        $error['rname'] = "*Username Is Required!!*";
    }
    if (empty($status)) {
        $error['rstatus'] = "*Status Is Required!!*";
    }
    if (empty($address)) {
        $error['raddress'] = "*Address Is Required!!*";
    }
    if (empty($number)) {
        $error['rnumber'] = "*Number Is Required!!*";
    }
    if (count($error) == 0) {
        $sql = "UPDATE `academy` SET id = $id, name = '$name', status = '$status', address = '$address', number = '$number' WHERE id = $id";
        $result = mysqli_query($con, $sql);
        if ($result) {
            echo "<script>";
            echo "alert('Academy Updated Successfully');";
            echo "window.location.href = 'listsports.php';";
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
    <link rel="icon" type="image/png" href="../../images/new_logo.png">
    <link rel="stylesheet" href="../../css/adminCss/updateAcademy.css">
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "../../../includes/adminHeader.php" ?>
    </div>
    <h1> UPDATE SPORTS ACADEMY:</h1>
    <div class="first">
        <div class="second">
            <form action="" method="post" id="form" name="form" onsubmit="return validateForm()">
                <div class="info">
                    <label>Academy Name</label>
                    <input type="text" name="name" id="name" placeholder="" value="<?php echo $name1; ?>">
                    <p class="require" style="color:red;font-style:italic;font-size:20px;">
                        <?php
                        if (isset($error['rname'])) {
                            echo $error['rname'];
                        }
                        ?>
                    </p>
                    <label>Academy Address</label>
                    <input type="text" name="address" id="address" placeholder="" value="<?php echo $address1; ?>">
                    <p class="require" style="color:red;font-style:italic;font-size:20px;">
                        <?php
                        if (isset($error['raddress'])) {
                            echo $error['raddress'];
                        }
                        ?>
                    </p>
                    <label>Academy Number</label>
                    <input type="text" name="number" id="number" placeholder="" value="<?php echo $number1; ?>">
                    <p class="require" style="color:red;font-style:italic;font-size:20px;">
                        <?php
                        if (isset($error['rnumber'])) {
                            echo $error['rnumber'];
                        }
                        ?>
                    </p>
                    <div class="rem">
                        <label>Status:</label>
                        <input type="radio" name="status" value="1" <?php if ($status1 == 1) echo "checked"; ?>> Active
                        <input type="radio" name="status" value="0" <?php if ($status1 == 0) echo "checked"; ?>> De Active
                    </div>
                </div>
                <button type="submit" name="submit" class="footer">UPDATE</button>
            </form>
        </div>
    </div>
    <script>
        function validateName() {
            var nameInput = document.getElementById("name");
            var name = nameInput.value.trim();
            var regex = /^[A-Za-z\s]+$/;

            if (!regex.test(name)) {
                alert("Invalid academy name. Only alphabets and spaces are allowed.");
                nameInput.focus();
                return false;
            }

            return true;
        }

        function validatePhoneNumber() {
            var numberInput = document.getElementById("number");
            var number = numberInput.value.trim();
            var regex = /^[0-9]{10}$/;

            if (!regex.test(number)) {
                alert("Invalid phone number. Please enter a 10-digit number without letters or symbols.");
                numberInput.focus();
                return false;
            }

            return true;
        }

        function validateForm() {
            if (!validateName() || !validatePhoneNumber()) {
                return false;
            }

            return true;
        }
    </script>
</body>

</html>