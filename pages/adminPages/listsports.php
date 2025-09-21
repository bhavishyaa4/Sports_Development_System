<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location:../../first.php?err=1');
}
?>
<?php
require_once '../../connect.php';

if (isset($_POST['updatebtn'])) {
    $update_id = $_POST['update_id'];

    $err = [];

    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $err['name'] = 'ENTER THE NAME OF ACADEMY!!!';
    }

    if (isset($_POST['add']) && !empty($_POST['add']) && trim($_POST['add'])) {
        $add = $_POST['add'];
    } else {
        $err['add'] = 'ENTER THE ADDRESS OF ACADEMY!!!';
    }

    if (isset($_POST['num']) && !empty($_POST['num']) && trim($_POST['num'])) {
        $num = $_POST['num'];
    } else {
        $err['num'] = 'ENTER THE NUMBER OF ACADEMY!!!';
    }

    $status = $_POST['status'];

    if (count($err) == 0) {
        $sql = "UPDATE sports_categories SET name='$name', status=$status, address='$add', number='$num' WHERE id=$update_id";
        $con->query($sql);
        if ($con->affected_rows == 1) {
            $success = 'ACADEMY UPDATED SUCCESSFULLY!!';
            echo "<script>alert('ACADEMY UPDATED SUCCESSFULLY!!');</script>";
        } else {
            $error = 'FAILED TO UPDATE ACADEMY!!';
            echo "<script>alert('FAILED TO UPDATE ACADEMY!!');</script>";
        }
    }
}

if (isset($_SESSION['added_academy'])) {
    $addedAcademy = $_SESSION['added_academy'];
    unset($_SESSION['added_academy']);

    $_SESSION['added_academies'][] = $addedAcademy;
}

if (isset($_SESSION['deleted_academy'])) {
    $deletedAcademy = $_SESSION['deleted_academy'];
    unset($_SESSION['deleted_academy']);

    if (isset($_SESSION['added_academies'])) {
        foreach ($_SESSION['added_academies'] as $key => $academy) {
            if ($academy['name'] === $deletedAcademy) {
                unset($_SESSION['added_academies'][$key]);
                echo "<script>alert('ACADEMY DELETED SUCCESSFULLY!!');</script>";
                break;
            }
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
    <link rel="stylesheet" href="../../css/adminCss/sportsUpdateView.css">
    <title>Admin | Sports Management</title>
</head>

<body>
    <div class="container">
        <?php require __DIR__  . "../../../includes/adminHeader.php" ?>
        <div class="show">
            <button class="start"><a href="addsports.php">ADD ACADEMY</a></button>
            <table border="1s">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>STATUS</th>
                        <th>ADDRESS</th>
                        <th>MOBILE</th>
                        <th>OPERATION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM academy";
                    $result = $con->query($sql);
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $status = $row['status'];
                            $address = $row['address'];
                            $number = $row['number'];
                            echo '<tr>
                            <th>' . $id . '</th>
                            <td>' . $name . '</td>
                            <td>' . $status . '</td>
                            <td>' . $address . '</td>
                            <td>' . $number . '</td>
                            <td>
                                <button class="update"><a href="./listacademyupdate.php?updateid=' . $id . '">UPDATE</a></button>
                                <button class="delete"><a href="./listacademydelete.php?deleteid=' . $id . '">DELETE</a></button>
                            </td>
                        </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="6">No sports academies found.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <?php
            if (isset($success)) {
                echo '<div style="color:green;">' . $success . '</div>';
            }
            if (isset($error)) {
                echo '<div style="color:red;">' . $error . '</div>';
            }
            ?>
        </div>
        <script>
            function confirmDelete(id) {
                if (confirm('Are you sure you want to delete this academy?')) {
                    window.location.href = './listdelete.php?deleteid=' + id;
                }
            }
        </script>
</body>

</html>