<?php
include 'connect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE AND DELETE SITE:</title>
</head>
<body>
<button type="submit"><a href="./regdetails.php">Add User</a> </button>
    <table border="1" cellspacing="0">
        <thead>
            <tr style="font-weight: bold;">
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sports</th>
                <th>Category</th> 
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM `applicant_register`";
            $result1 = mysqli_query($con,$sql);
            if($result1){
               while($row = mysqli_fetch_assoc($result1)){
                $id = $row['id'];
                $fname = $row['name'];
                $email = $row['email'];
                $category = $row['category'];
                $sp = $row['sports'];
                echo '
                <tr>
                <td>'.$id.'</td>
                <td>'.$fname.'</td>
                <td>'.$email.'</td>
                <td>'.$category.'</td>
                <td>'.$sp.'</td>
                <td>
                <button class="update"><a href ="adminupdate.php?updateid='.$id.'">Update</a></button>
                <button class="delete"><a href ="delete.php?deleteid='.$id.'">Delete</a></button>
                </td>
            </tr>';
               } 
            }?>
        </tbody>
    </table>
</body>
</html>