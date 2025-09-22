<?php include __DIR__ . '/../config.php'; ?>

<link rel="stylesheet" href="<?php echo BASE_URL; ?>/css/userCss/navBar.css">

<div class="header">
    <div id="logo">SportsZen</div>
    <button class="menu-toggle" id="menu-btn">☰</button>
    <div id="navbar">
        <ul id="nav-links">
            <li><a href="<?php echo BASE_URL; ?>/index.php">Home</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/viewsa.php">Sports Academy</a></li>
            <li><a href="<?php echo BASE_URL; ?>/pages/userPages/aboutus.php">About Us</a></li>
            <li><a href="<?php echo BASE_URL; ?>/login.php" class="logout-link">Login/Register</a></li>
        </ul>
    </div>
</div>

<script>
    const menuToggle = document.querySelector(".menu-toggle");
    const navMenu = document.querySelector("#navbar ul");

    menuToggle.addEventListener("click", () => {
        navMenu.classList.toggle("active");
    });
</script>