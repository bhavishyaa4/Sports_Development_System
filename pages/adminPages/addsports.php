<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location: ../../first.php?err=1');
}
?>
<?php
require_once '../../connect.php';

if (isset($_POST['savebtn'])) {
    $err = [];

    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $err['name'] = 'Please enter the name of the academy.';
    }

    if (isset($_POST['add']) && !empty($_POST['add']) && trim($_POST['add'])) {
        $add = $_POST['add'];
    } else {
        $err['add'] = 'Please enter the address of the academy.';
    }

    if (isset($_POST['num']) && !empty($_POST['num']) && trim($_POST['num'])) {
        $num = $_POST['num'];
    } else {
        $err['num'] = 'Please enter the number of the academy.';
    }

    $status = $_POST['status'];
    $created_at = date('Y-m-d H:i:s');

    if (isset($_SESSION['admin_id'])) {
        $created_by = $_SESSION['admin_id'];
        if (count($err) == 0) {
            $stmt = $con->prepare("INSERT INTO academy (name, status, address, number, generated_at, generated_by) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sissss", $name, $status, $add, $num, $created_at, $created_by);

            if ($stmt->execute()) {
                $success = 'Academy inserted successfully.';
                echo "<script>";
                echo "alert('Academy Added Successfully');";
                echo "window.location.href = 'addsports.php';";
                echo "</script>";
            } else {
                $error = 'Failed to insert academy: ' . $stmt->error;
            }

            $stmt->close();
        }
    } else {
        $error = 'Admin not logged in. Please log in as an admin.';
    }
}

$con->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../images/new_logo.png">
    <link rel="stylesheet" href="../../css/adminCss/addAcademy.css">
    <title>Admin | Add Academy</title>
    <script>
        function validateForm() {
            var name = document.getElementById("name").value;

            if (name === "") {
                alert("Please enter the academy name.");
                return false;
            } else if (!isNaN(name)) {
                alert("Academy name cannot be a number.");
                return false;
            }

            var existingNames = [' Academy', 'Nepal Academy', 'India Sports Academy'];
            if (existingNames.includes(name)) {
                alert("Academy name already exists. Please enter a different name.");
                return false;
            }

            if (num === "") {
                alert("Please enter the academy number.");
                return false;
            } else if (!/^\d{10}$/.test(num) || isNaN(num)) {
                alert("Please enter a valid 10-digit numeric academy number.");
                return false;
            }

            return true;
        }
    </script>
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "../../../includes/adminHeader.php" ?>
        <h1>ADD SPORTS ACADEMY</h1>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <?php if (isset($success)) { ?>
            <div class="success"><?php echo $success; ?></div>
        <?php } ?>
        <div class="first">
            <div class="second">
                <form action="" method="post" onsubmit="return validateForm()">
                    <div class="info">
                        <label for="name">Name of Academy:</label>
                        <input type="text" id="name" name="name" autocomplete="off" placeholder="Enter the name of the academy">
                        <?php if (isset($err['name'])) { ?>
                            <span class="error"><?php echo $err['name']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="info">
                        <label for="add">Address of Academy:</label>
                        <input type="text" id="add" name="add" autocomplete="off" placeholder="Enter the address of the academy">
                        <?php if (isset($err['add'])) { ?>
                            <span class="error"><?php echo $err['add']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="info">
                        <label for="num">Number of Academy:</label>
                        <input type="text" id="num" name="num" autocomplete="off" placeholder="Enter the number of the academy">
                        <?php if (isset($err['num'])) { ?>
                            <span class="error"><?php echo $err['num']; ?></span>
                        <?php } ?>
                    </div>
                    <div class="rem">
                        <label for="status">Status:</label>
                        <select id="status" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="savebtn" class="footer">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>