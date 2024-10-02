<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `user_register` where id=$id";
    $result = mysqli_query($con,$sql);   
    }
    if($result){
        echo "<script>";
        echo "alert('User Deleted Successfully');";
        echo "window.location.href = 'listuser.php';";
        echo "</script>";
    }
    else{
        die(mysqli_error($con));
}
?>