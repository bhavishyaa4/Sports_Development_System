<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('location: ./first.php?err=1');
    exit;
}

include 'connect.php';

$name = $username = $email = $password = $role = $status = '';
$err = [];
$success_message = '';

function doesNameStartWithDigit($name) {
    return ctype_digit(substr($name, 0, 1));
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpass = $_POST['cpass'];
    $role = $_POST['role'];
    $status = $_POST['status'];

    if (doesNameStartWithDigit($name)) {
        $err['name'] = '*Name should not start with a digit*';
    }

    $encrypted_password = md5($password);

     // Check if the email already exists in the database
     $check_email_query = "SELECT * FROM admins WHERE email = ?";
     $stmt = $con->prepare($check_email_query);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $result = $stmt->get_result();
 
     if ($result->num_rows > 0) {
         $err['email'] = '*Email already exists*';
     }

    if (empty($name)) {
        $err['name'] = '*Name is required*';
    }
    if (empty($email)) {
        $err['email'] = '*Email is required*';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err['email'] = '*Invalid email address*';
    }
    if (empty($password)) {
        $err['password'] = '*Password is required*';
    }
    if (empty($cpass)) {
        $err['cpass'] = '*Confirm Password is required*';
    } elseif ($password !== $cpass) {
        $err['cpass'] = '*Passwords do not match*';
    }
    if (empty($role)) {
        $err['role'] = '*Role is required*';
    }

    if (empty($err)) {
        $stmt = $con->prepare("INSERT INTO admins (name, email, password, role, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $encrypted_password, $role, $status);

        if ($stmt->execute()) {
            $success_message = "<p class='success-message'>Data has been inserted successfully.</p>";
            echo "<script>";
            echo "alert('Admin Added Successfully');";
            echo "window.location.href = 'addadmin.php';";
            echo "</script>";

        } else {
            $err['database'] = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Adding Admin</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
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
.content{
    display:flex;
    flex-direction: column;
    padding-left: 1%;
}
.content h1{
    margin-top: 5%;
}
.content p{
    margin-top: 10%;
}
h1{
    text-decoration: underline;
    font-style: italic;
    font-size: 350%;
}
h1:hover{
    color: lime;
    transition: 0.5s;
}
p{
    font-style:italic;
    font-size: 250%;
    font-weight: bold;
}
p:hover{
    color:orange;
    transition: 0.5s;
}
.icon{
    position:fixed;
    top:25%;
    height:400px;
    width:50px;
    margin-left:96%;
    background-color: grey;
    border-radius: 60px 0 0 60px;
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-direction: column;
}
.icon:hover{
    background-color: black;
}
.icon a{
    color:yellow;
}
.icon a:hover{
    color:red;
}
.info {
    display:grid;
    grid-template-columns: 1fr 1fr;
    gap:10px;
    height:400px;
    margin: 0 auto;
    margin-top:75px;
    padding: 10px;
    border-radius: 4px;
    width: 800px;
    background:transparent;
    border: 3px solid black;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 15px black;
    color:whitesmoke;
    border-radius: 11px;
    padding: 17px 25px;
    /* margin-left: -110px; */
}

.info h2, .info h3 {
    text-align: left;
    font-size: larger;
}
.first {
    padding: 15px;
    border-radius: 5px;
    /* box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); */
}
.second, .third {
    padding: 0px;
    margin-right: 45px;
}

.second label, .third label {
    display: grid;
    margin-bottom: 22px;
    font-weight: bold;
    font-size: 18px;
    color:black;
}

.second input[type="text"], .second input[type="password"], .second select, .third input[type="text"], .third input[type="number"], .third input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid grey;
    border-radius: 5px;
    box-shadow: none;
    font-size: 14px;
    color: black;
    margin-bottom: 20px;
}
.footer {
    width: 100px;
    margin-top:;
    margin-left:97%;
    background-color: #4CAF50;
    color: black;
    padding: 10px;
    text-align: center;
    border-radius: 5px;
    margin-top: 10%;
    cursor: pointer;
}
.footer:hover{
    background-color: yellow;
}
#error-message {
    color: red;
    font-size: 15px;
    margin-bottom: 4%;
    margin-top: -5%;
}
.success-message{
    color: lime;
    font-size: 25px;
    text-align: center;
    margin-top:20px;
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
    <form method="POST" action="addadmin.php" onsubmit="return validateForm()">
    <div class="info">
                <div class="second">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" autocomplete="off" placeholder="Enter your name" value="">
                    <span id="error">
                    <?php if (isset($err['name'])): ?>
                        <p id="error-message"><?php echo $err['name']; ?></p>
                    <?php endif; ?>
                    </span>
                    <label for="pass">Password</label>
                    <input type="password" class="password" id="pass" name="password" autocomplete="off" placeholder="****" value="">
                    <span id="error">
                    <?php if (isset($err['password'])): ?>
                        <p id="error-message"><?php echo $err['password']; ?></p>
                    <?php endif; ?>
                    </span>

                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="select">Choose Status</option>
                        <option value="1">Active</option>
                        <option value="0">Not Active</option>
                    </select>
                    <span id="error">
                    <?php if (isset($err['status'])): ?>
                        <p id="error-message"><?php echo $err['status']; ?></p>
                    <?php endif; ?>
                    </span>
                    <button type="submit" name="submit" class="footer">ADD</button>
                </div>
                <div class="third">
                <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" placeholder="Enter your email" value="">
                    <span id="error">
                    <?php if (isset($err['email'])): ?>
                        <p id="error-message"><?php echo $err['email']; ?></p>
                    <?php endif; ?>
                    </span>

                    <label for="cpass">Confirm Password</label>
                    <input type="password" name="cpass" autocomplete="off" id="cpass" placeholder="****" value="">
                    <?php if (isset($err['cpass'])): ?>
                        <span id="error">
                        <p id="error-message"><?php echo $err['cpass']; ?></p>
                    <?php endif; ?>
                    </span>
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" autocomplete="off" placeholder="Enter your role" value="">
                    <?php if (isset($err['role'])): ?>
                        <span id="error">
                        <p id="error-message"><?php echo $err['role']; ?></p>
                    <?php endif; ?>
                </div>
                </span>
            </div>
            <span id="error">
            <?php if (isset($err['database'])): ?>
                <p id="error-message"><?php echo $err['database']; ?></p>
            <?php endif; ?>
            </span>
            <span id="error">
            <?php if (!empty($success_message)): ?>
                <p><?php echo $success_message; ?></p>
            <?php endif; ?>
            </span>
            <div id="error-container"></div>
            <!-- <button type="submit" name="submit" class="footer">ADD</button> -->
        </form>
    </div>
    <!-- <script>
        document.getElementById('myForm').addEventListener('submit', function (event) {
  event.preventDefault();

  // Get form field values
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var password = document.getElementById('pass').value;
  var confirmPassword = document.getElementById('cpass').value;
  var role = document.getElementById('role').value;
  var span = document.getElementById('error');
  var message = document.getElementById('error-message');
  
  // Regular expressions for validation
  var nameRegex = /^[a-zA-Z\s]*$/;
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  // Error messages
  var errors = [];

  // Validate name
  if (!nameRegex.test(name)) {
    errors.push("Invalid Name: Name must not contain numbers or special characters.");
    alert("Invalid Name: Name must not contain numbers or special characters.");
  }

  // Validate email format
  if (!emailRegex.test(email)) {
    errors.push("Invalid Email: Please enter a valid email address.");
    alert("Invalid Email: Please enter a valid email address.");
  }

  // Validate role
  if (role.trim() === '') {
    errors.push("Empty Role: Role must not be empty.");
    alert("Empty Role: Role must not be empty.");
  }

//   // Validate password and confirm password
  if (password !== confirmPassword) {
    message.innerHTML = "*Passwords must be same";   
  }

  // Display error messages or submit the form
  if (errors.length > 0) {
    var errorContainer = document.getElementById('error-container');
    errorContainer.innerHTML = '';

    for (var i = 0; i < errors.length; i++) {
      var error = document.createElement('p');
      error.textContent = errors[i];
      errorContainer.appendChild(error);
    }
  } else {
    this.submit();
  }
});
    </script> -->
</body>
</html>
