<?php include __DIR__ . '/../config.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/userCss/userNavBar.css">

<div class="header">
    <div id="logo">SportsZen</div>

    <div id="navbar">
        <ul id="nav-links">
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/dex.php">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/sa.php">Sports Academy</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/apply.php">Apply</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/allaboutus.php">About Us</a></li>

            <li class="dropdown">
                <a href="#" class="logout-link">Other Options</a>
                <div class="dropdown-menu">
                    <a href="<?php echo BASE_URL; ?>/pages/userPages/userlogout.php">Logout</a>
                    <a href="<?php echo BASE_URL; ?>/pages/userPages/userpasswordupdate.php">Change Password</a>
                    <a href="<?php echo BASE_URL; ?>/pages/userPages/updateprofile.php">Update Profile</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="menu-toggle" id="mobile-menu">&#9776;</div>
</div>

<script>
    const menuToggle = document.getElementById('mobile-menu');
    const navLinks = document.getElementById('nav-links');
    const dropdown = document.querySelector('.dropdown');
    const logoutLink = dropdown.querySelector('.logout-link');

    menuToggle.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

    logoutLink.addEventListener('click', (e) => {
        e.preventDefault();
        dropdown.classList.toggle('active');
    });

    document.addEventListener('click', (e) => {
        if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('active');
        }
    });
</script>