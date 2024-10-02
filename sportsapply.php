<?php
session_start();
if(isset($_SESSION['userId'])){
    $id = $_SESSION['userId'];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Apply here:<h1>
       <?php
        echo "<a href='apply.php?id=".$id."'>CLick Here</a>"
       ?>
</body>
</html>