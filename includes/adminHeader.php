<?php include __DIR__ . '/../config.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/adminCss/navBar.css">

<div class="header">
    <div id="logo">SportsZen</div>

    <div id="navbar">
        <ul id="nav-links">
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/userhome.php">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/addsports.php">Add Sports Academy</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/listsports.php">List Sports Academy</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/listuser.php">List Users</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/adminPages/addadmin.php">Add Admin</a></li>

            <li class="dropdown">
                <a href="#" class="logout-link">Other Options</a>
                <div class="dropdown-menu">
                    <a href="<?php echo BASE_URL; ?>/pages/adminPages/createsports.php">Add New Sport</a>
                    <a href="<?php echo BASE_URL; ?>/pages/adminPages/adminSports.php">Delete Sport</a>
                    <a href="<?php echo BASE_URL; ?>/pages/adminPages/logout.php">Logout</a>
                    <a href="<?php echo BASE_URL; ?>/pages/adminPages/adminpasswordupdate.php">Change Password</a>
                    <a href="<?php echo BASE_URL; ?>/pages/adminPages/updateadminprofile.php">Update Profile</a>
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