<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show password:</title>
</head>
<body>
<div class="show">
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
                <th>Password</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `user_register`";
            $result1 = mysqli_query($con,$sql);
            if($result1){
               while($row = mysqli_fetch_assoc($result1)){
                $id = $row['id'];
                $uname = $row['name'];
                $email = $row['email'];
                $gender = $row['gender'];
                $mobile = $row['number'];
                $sports = $row['sports'];
                $position = $row['position'];
                $password = $row['password'];
                // $cpass = $row['confirm_password'];
                echo '
                <tr>
                <td>'.$id.'</td>
                <td>'.$uname.'</td>
                <td>'.$email.'</td>
                <td>'.$gender.'</td>
                <td>'.$mobile.'</td>
                <td>'.$sports.'</td>
                <td>'.$position.'</td>
                <td>'.$password.'</td>
                <td>
                <button class="update"><a href ="userpasswordupdate.php?updateid='.$id.'">Update</a></button>
                <button class="delete"><a href ="listuserdelete.php?deleteid='.$id.'">Delete</a></button>
                </td>
            </tr>';
               } 
            }?>
        </tbody>
    </table>
        </div>
</body>
</html>