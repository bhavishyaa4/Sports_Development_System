<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:first.php?err=1');
    }
?>
<?php
require_once 'connect.php';

// Check if update form is submitted
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

// Check if academy is added from another page
if (isset($_SESSION['added_academy'])) {
    $addedAcademy = $_SESSION['added_academy'];
    unset($_SESSION['added_academy']);

    // Add the newly added academy to the existing academies list
    $_SESSION['added_academies'][] = $addedAcademy;
}

// Check if academy is deleted from another page
if (isset($_SESSION['deleted_academy'])) {
    $deletedAcademy = $_SESSION['deleted_academy'];
    unset($_SESSION['deleted_academy']);

    // Remove the deleted academy from the existing academies list
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
    <title>LIST SPORTS:</title>
    <style>
                     *{
            margin: 0;
            padding: 0;
        }
        /* body{
            display:flex;
            flex-direction:column;
            justify-content: center;
            align-items: center;
        } */
        .header{
            width: 100%;
            height: 90px;
            background-color: grey;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        ul{
            display: flex;
        }
        li{
            margin-left: 20px;
            list-style: none;
        }
        li a{
            text-decoration: none;
            color: black;
        }

        .header #logo{
        top: 20px;
        font-size: 30px;
        z-index: 997;
        font-weight: bold;
        color: yellow;
        margin-left: 20px;
        }
    .logout{
    margin-right: 20px;
    }
    .logout{
    height: 50px;
    width: 120px;
    top: 20px;
    right: 3%;
    display:grid;
    place-items: center;
    background:lime;
    border-radius: 1px 30px;
    font-weight: bold;
}
.logout:hover{
    background-color: orangered;
}
.logout a{
    color:black;
}
#navbar ul :not(:last-child) a:hover,
#navbar ul :not(:last-child) a:focus{
    border-bottom:2px solid white;
    border-radius: 1px 11px;
}
#navbar ul li{
    font-size: 22px;
    font-weight:    bold;
    margin: 0 40px;
}
#navbar ul li a{
    text-decoration: none;
    color: purple;
}
#navbar ul li a:hover{
    color:blue;
}
/* .w{
    color:white;
    background-color:red;
    font-size:17px;
    margin-bottom: 4%;
    font-family:Georgia, 'Times New Roman', Times, serif;
}
.err_msg{
    color:red;
    font-size: 25px;
    font-family:Georgia, 'Times New Roman', Times, serif;
}
.sucess_msg{
    background-color:green;
    color:white;
    margin-bottom:10px;
    font-size: 17px;
    font-family:Georgia, 'Times New Roman', Times, serif;
}
.error_msg{
    background-color:red;
    color:white;
    margin-bottom:10px;
    font-size: 17px;
    font-family:Georgia, 'Times New Roman', Times, serif;
} */
.show{
    margin-top: 4%;
    display:flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;

}
.start{
    height: 30px;
    width: 120px;
    right: 3%;
    display:grid;
    place-items: center;
    background:transparent;
    border-radius: 0px;
    font-weight: bold;
    margin-bottom: 1.5%;
}
.start:hover{
    background-color: orangered;
}
.start a{
    color:black;
    text-decoration: none;
}
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    border-width: bold;
    border-style:solid;
    background-color: grey;
    width: 120px;
    z-index: 1;
}
.dropdown-content a {
    color: purple;
    font-weight: bold;
    font-size: large;
    padding: 20px 5px;
    text-decoration: none;
    display: block;
}
.dropdown-content a:hover {
    text-decoration: underline;
}
.dropdown:hover .dropdown-content {
    display: block;
}  
</style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div id="logo">SportsZen</div>
            <div id="navbar">
                <ul>
                <li><a href="userhome.php">Home</a></li>
                <li><a href="addsports.php">Add Sports Academy</a></li>
                <li><a href="listsports.php">List Sports Academy</a></li>
                <li><a href="listuser.php">List Users</a></li>
                <li class="dropdown">
                <a href="#" class="dropbtn">Sports</a>
                <div class="dropdown-content">
                <a href="createsports.php">Add New Sport</a>
                <a href="adminSports.php">Delete Sport</a>
            </div>
                <li><a href="addadmin.php">Add Admin</a></li>
                </ul>
            </div>
            <div class="dropdown">
            <button class="logout">Logout/Change Password</button>
            <div class="dropdown-content">
        <a href="logout.php">Logut</a>
        <a href="adminpasswordupdate.php">Change Password</a>
        <a href="updateadminprofile.php">Update Profile</a>
    </div>
        </div>
    </div>
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
                // Redirect to delete page or perform delete operation here
                window.location.href = './listdelete.php?deleteid=' + id;
            }
        }
    </script>
</body>
</html>
