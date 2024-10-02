<?php
    session_start();
    if(!isset($_SESSION['admin_id'])){
        header('location:first.php?err=1');
    }
?>
<?php
// Start or resume the session
// Include the connection file (connect.php)
require_once 'connect.php';

// Check if the form is submitted
if (isset($_POST['savebtn'])) {
    $err = [];

    // Validate and retrieve form input data
    if (isset($_POST['name']) && !empty($_POST['name']) && trim($_POST['name'])) {
        $name = $_POST['name'];
    } else {
        $err['name'] = 'Please enter the name of the academy.';
    }

    if (isset($_POST['add']) && !empty($_POST['add']) && trim($_POST['add'])) {
        $add = $_POST['add'];
    } else {
        $err['add'] = 'Please enter the address of the academy.';
    }

    if (isset($_POST['num']) && !empty($_POST['num']) && trim($_POST['num'])) {
        $num = $_POST['num'];
    } else {
        $err['num'] = 'Please enter the number of the academy.';
    }

    $status = $_POST['status'];
    $created_at = date('Y-m-d H:i:s');

    // Check if the admin_id session variable is set
    if (isset($_SESSION['admin_id'])) {
        $created_by = $_SESSION['admin_id'];

        if (count($err) == 0) {
            // Prepare and execute the SQL query
            $stmt = $con->prepare("INSERT INTO academy (name, status, address, number, generated_at, generated_by) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sissss", $name, $status, $add, $num, $created_at, $created_by);

            // Execute the query
            if ($stmt->execute()) {
                $success = 'Academy inserted successfully.';
                echo "<script>";
                echo "alert('Academy Added Successfully');";
                echo "window.location.href = 'addsports.php';";
                echo "</script>";
            } else {
                $error = 'Failed to insert academy: ' . $stmt->error; // Get the error message
            }

            $stmt->close(); // Close the prepared statement
        }
    } else {
        $error = 'Admin not logged in. Please log in as an admin.';
    }
}

// Close the database connection
$con->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD SPORTS ACADEMY</title>
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
.info{
    display:flex;
    flex-direction: column;
    width:350px;
    margin-top: 15px;
}
label{
    font-size:20px; 
    color:black;
    font-weight: lighter;
    font-family:Georgia, 'Times New Roman', Times, serif; 
}
.info input[type="text"], .info input[type="password"]{
    margin-top: 10px;
    width: 100%;
    padding: 10px;
    border: 1px solid grey;
    border-radius: 5px;
    box-shadow: none;
    font-size: 14px;
    color: black;
    margin-bottom: 20px;
}
.rem{
    margin-top: 5%;
    margin-bottom:5%;
    color:black;
    font-size: 20px;
}
.info input[type="radio"]{
    width:10%;
}
.info input[type="submit"]{
    width: 50%;
    margin-left: 25%;
    color: rgba(2, 82, 255, 0.925);
    padding: 10px 20px;
    border: solid;
    border-radius: 5px;
    font-weight: bold;
    font-size: 16px;
    cursor: pointer;
}
.w{
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
    /* font-family:Georgia, 'Times New Roman', Times, serif; */
}
.error_msg{
    background-color:red;
    color:white;
    margin-bottom:10px;
    font-size: 17px;
    /* font-family:Georgia, 'Times New Roman', Times, serif; */
}
.first{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 50vh;
}
.second{
    width: 400px;
    background:transparent;
    border: 3px solid black;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 15px black;
    color:whitesmoke;
    border-radius: 11px;
    padding: 17px 25px;
}
h1{
    text-align: center;
    margin-top: 30px;
    margin-bottom: 50px;
}
.footer{
    margin-left: 165px;
    font-size: 16px;
    border-radius: 10px 0 10px 0;
    margin-bottom: 4px;  
    width: 60px;
    height:30px;
    place-items: center;
    background-color: lime;
    cursor: pointer;
}
.footer:hover{
    background-color: blue;
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
.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
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
    <script>
        // Function to validate the form
        function validateForm() {
            var name = document.getElementById("name").value;
            var num = document.getElementById("num").value;

            // Validate academy name
            if (name === "") {
                alert("Please enter the academy name.");
                return false;
            } else if (!isNaN(name)) {
                alert("Academy name cannot be a number.");
                return false;
            }

            // Assuming you have an array of existing academy names called 'existingNames'
            var existingNames = [' Academy', 'Nepal Academy', 'India Sports Academy']; // Replace with your actual array of existing academy names
            if (existingNames.includes(name)) {
                alert("Academy name already exists. Please enter a different name.");
                return false;
            }

            // Validate academy number
            if (num === "") {
                alert("Please enter the academy number.");
                return false;
            } else if (!/^\d{10}$/.test(num) || isNaN(num)) {
                alert("Please enter a valid 10-digit numeric academy number.");
                return false;
            }

            return true;
        }
    </script>
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
        <h1>ADD SPORTS ACADEMY</h1>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <?php if (isset($success)) { ?>
            <div class="success"><?php echo $success; ?></div>
        <?php } ?>
        <div class="first">
            <div class="second">
        <form action="" method="post" onsubmit="return validateForm()">
            <div class="info">
                <label for="name">Name of Academy:</label>
                <input type="text" id="name" name="name" autocomplete="off" placeholder="Enter the name of the academy">
                <?php if (isset($err['name'])) { ?>
                    <span class="error"><?php echo $err['name']; ?></span>
                <?php } ?>
            </div>
            <div class="info">
                <label for="add">Address of Academy:</label>
                <input type="text" id="add" name="add" autocomplete="off" placeholder="Enter the address of the academy">
                <?php if (isset($err['add'])) { ?>
                    <span class="error"><?php echo $err['add']; ?></span>
                <?php } ?>
            </div>
            <div class="info">
                <label for="num">Number of Academy:</label>
                <input type="text" id="num" name="num" autocomplete="off" placeholder="Enter the number of the academy">
                <?php if (isset($err['num'])) { ?>
                    <span class="error"><?php echo $err['num']; ?></span>
                <?php } ?>
            </div>
            <div class="rem">
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="savebtn" class="footer">Save</button>
            </div>
        </form>
            </div>
        </div>
    </div>
</body>
</html>
