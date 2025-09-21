<?php include __DIR__ . '/../config.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/adminCss/navBar.css">

<div class="header">
    <div id="logo">SportsZen</div>
    <div id="navbar">
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/userhome.php">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/addsports.php">Add Sports Academy</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/listsports.php">List Sports Academy</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/listuser.php">List Users</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Sports</a>
                <div class="<?php echo BASE_URL; ?> dropdown-content">
                    <a href="<?php echo BASE_URL; ?>/pages/adminPages/createsports.php">Add New Sport</a>
                    <a href="<?php echo BASE_URL; ?>/pages/adminPages/adminSports.php">Delete Sport</a>
                </div>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/addadmin.php">Add Admin</a></li>
        </ul>
    </div>
    <div class="dropdown">
        <button class="logout">Logout/Change Password</button>
        <div class="dropdown-content">
            <a href="<?php echo BASE_URL; ?>/pages/adminPages/logout.php">Logut</a>
            <a href="<?php echo BASE_URL; ?>/pages/adminPages/adminpasswordupdate.php">Change Password</a>
            <a href="<?php echo BASE_URL; ?>/pages/adminPages/updateadminprofile.php">Update Profile</a>
        </div>
    </div>
</div>
</div>