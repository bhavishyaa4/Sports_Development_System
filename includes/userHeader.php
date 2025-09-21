<?php include __DIR__ . '/../config.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/userCss/userNavBar.css">

<div class="header">
    <div id="logo">SportsZen</div>
    <div id="navbar">
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/dex.php">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/sa.php">Sports Academy</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/apply.php">Apply</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/allaboutus.php">About Us</a></li>
        </ul>
    </div>
    <div class="dropdown">
        <button class="logout">Logout/Change Password</button>
        <div class="dropdown-content">
            <a href="<?php echo BASE_URL; ?>/pages/userPages/userlogout.php">Logut</a>
            <a href="<?php echo BASE_URL; ?>/pages/userPages/userpasswordupdate.php">Change Password</a>
            <a href="<?php echo BASE_URL; ?>/pages/userPages/updateprofile.php">Update Profile</a>
        </div>
    </div>
</div>