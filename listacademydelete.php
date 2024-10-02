<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $sql = "DELETE FROM `academy` where id=$id";
    $result = mysqli_query($con,$sql);   
    }
    if($result){
        echo "<script>";
            echo "alert('Academy Deleted Successfully');";
            echo "window.location.href = 'listsports.php';";
            echo "</script>";
    }
    else{
        die(mysqli_error($con));
}
?>