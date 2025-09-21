<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location: ../../first.php?err=1');
}
?>
<?php
include '../../connect.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../images/new_logo.png">
    <link rel="stylesheet" href="../../css/adminCss/listUser.css">
    <title>Admin | User Management</title>
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "../../../includes/adminHeader.php" ?>
        <div class="show">
            <button type="submit" class="start"><a href="../../ureg.php">Add User</a> </button>
            <table border="1" cellspacing="0">
                <thead>
                    <tr style="font-weight: bold;">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Number</th>
                        <th>Sports</th>
                        <th>Position</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `user_register`";
                    $result1 = mysqli_query($con, $sql);
                    if ($result1) {
                        while ($row = mysqli_fetch_assoc($result1)) {
                            $id = $row['id'];
                            $uname = $row['name'];
                            $email = $row['email'];
                            $gender = $row['gender'];
                            $mobile = $row['number'];
                            $sports = $row['sports'];
                            $position = $row['position'];
                            echo '
                <tr>
                <td>' . $id . '</td>
                <td>' . $uname . '</td>
                <td>' . $email . '</td>
                <td>' . $gender . '</td>
                <td>' . $mobile . '</td>
                <td>' . $sports . '</td>
                <td>' . $position . '</td>
                <td>
                <button class="update"><a href ="listuserupdate.php?updateid=' . $id . '">Update</a></button>
                <button class="delete"><a href ="listuserdelete.php?deleteid=' . $id . '">Delete</a></button>
                </td>
            </tr>';
                        }
                    } ?>
                </tbody>
            </table>
        </div>
</body>

</html>