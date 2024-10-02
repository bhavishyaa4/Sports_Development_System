<?php
include 'connect.php';
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM `sports` WHERE `id` = '$id'";
    $res = mysqli_query($con,$sql);
    if($res){
        echo "<script>";
            echo "alert('Sports Deleted Successfully');";
            echo "window.location.href = 'adminSports.php';";
            echo "</script>";
    }
    else{
        echo mysqli_error($con);    
    }
}
?>