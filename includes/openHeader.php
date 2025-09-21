<?php include __DIR__ . '/../config.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/userCss/navBar.css">

<div class="header">
    <div id="logo">SportsZen</div>
    <div id="navbar">
        <ul>
            <li><a href="<?php echo BASE_URL; ?>/index.php">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/viewsa.php">Sports Academy</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/aboutus.php">About Us</a></li>
        </ul>
    </div>
    <div class="out">
        <button class="logout"><a href="<?php echo BASE_URL; ?>/login.php">Login/Register</a></button>
    </div>
</div>