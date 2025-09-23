<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location: ../.././first.php?err=1');
    exit;
}

include '../../connect.php';

$name = $username = $email = $password = $role = $status = '';
$err = [];
$success_message = '';

function doesNameStartWithDigit($name)
{
    return ctype_digit(substr($name, 0, 1));
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    if (doesNameStartWithDigit($name)) {
        $err['name'] = '*Name should not start with a digit*';
    }

    $encrypted_password = md5($password);

    $check_email_query = "SELECT * FROM admins WHERE email = ?";
    $stmt = $con->prepare($check_email_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $err['email'] = '*Email already exists*';
    }

    if (empty($name)) {
        $err['name'] = '*Name is required*';
    }
    if (empty($email)) {
        $err['email'] = '*Email is required*';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = '*Invalid email address*';
    }
    if (empty($password)) {
        $err['password'] = '*Password is required*';
    }
    if (empty($cpass)) {
        $err['cpass'] = '*Confirm Password is required*';
    } elseif ($password !== $cpass) {
        $err['cpass'] = '*Passwords do not match*';
    }
    if (empty($role)) {
        $err['role'] = '*Role is required*';
    }

    if (empty($err)) {
        $stmt = $con->prepare("INSERT INTO admins (name, email, password, role, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $encrypted_password, $role, $status);

        if ($stmt->execute()) {
            $success_message = "<p class='success-message'>Data has been inserted successfully.</p>";
            echo "<script>";
            echo "alert('Admin Added Successfully');";
            echo "window.location.href = 'addadmin.php';";
            echo "</script>";
        } else {
            $err['database'] = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../images/new_logo.png">
    <link rel="stylesheet" href="../../css/adminCss/addAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Admin | Add Admin</title>
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "../../../includes/adminHeader.php" ?>
        <form method="POST" action="addadmin.php" onsubmit="return validateForm()">
            <div class="info">
                <div class="second">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autocomplete="off" placeholder="Enter your name" value="">
                    <span id="error">
                        <?php if (isset($err['name'])): ?>
                            <p id="error-message"><?php echo $err['name']; ?></p>
                        <?php endif; ?>
                    </span>

                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" placeholder="Enter your email" value="">
                    <span id="error">
                        <?php if (isset($err['email'])): ?>
                            <p id="error-message"><?php echo $err['email']; ?></p>
                        <?php endif; ?>
                    </span>

                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" autocomplete="off" placeholder="Enter your role" value="">
                    <?php if (isset($err['role'])): ?>
                        <span id="error">
                            <p id="error-message"><?php echo $err['role']; ?></p>
                        </span>
                    <?php endif; ?>

                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="select">Choose Status</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                    <span id="error">
                        <?php if (isset($err['status'])): ?>
                            <p id="error-message"><?php echo $err['status']; ?></p>
                        <?php endif; ?>
                    </span>
                </div>

                <div class="third">
                    <label for="pass">Password</label>
                    <input type="password" class="password" id="pass" name="password" autocomplete="off" value="">
                    <span id="error">
                        <?php if (isset($err['password'])): ?>
                            <p id="error-message"><?php echo $err['password']; ?></p>
                        <?php endif; ?>
                    </span>

                    <label for="cpass">Confirm Password</label>
                    <input type="password" name="cpass" autocomplete="off" id="cpass" value="">
                    <?php if (isset($err['cpass'])): ?>
                        <span id="error">
                            <p id="error-message"><?php echo $err['cpass']; ?></p>
                        </span>
                    <?php endif; ?>
                    
                </div>
                <div class="form-footer">
                    <button type="submit" name="submit" class="footer">ADD</button>
                </div>
            </div>

            <span id="error">
                <?php if (isset($err['database'])): ?>
                    <p id="error-message"><?php echo $err['database']; ?></p>
                <?php endif; ?>
            </span>
            <span id="error">
                <?php if (!empty($success_message)): ?>
                    <p><?php echo $success_message; ?></p>
                <?php endif; ?>
            </span>
            <div id="error-container"></div>
        </form>
    </div>
</body>


</html>