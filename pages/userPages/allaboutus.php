<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('location: ../.././login.php?err=1');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../../images/new_logo.png">
    <link rel="stylesheet" href="../../css/userCss/about.css">
    <title>About Sports Development System</title>
</head>

<body>
    <div class="container">
        <?php include __DIR__ . "../../../includes/userHeader.php" ?>
        <header>
            <h1>Sports Development System</h1>
        </header>

        <section>
            <h2>About Us</h2>
            <p>Welcome to the Sports Development System, where we are committed to fostering growth and excellence in
                sports. Our system is designed to provide a platform for athletes, coaches, and sports enthusiasts to
                thrive and achieve their full potential.</p>

            <p>At Sports Development System, we believe in the power of sports to inspire, unite, and transform lives. Our
                mission is to contribute to the development of a healthier and more active community by supporting and
                promoting sports at all levels.</p>

            <h2>Our Vision</h2>
            <p>To be a leading force in sports development, empowering individuals to embrace a healthy and active
                lifestyle through the pursuit of excellence in sports.</p>

            <h2>Our Values</h2>
            <ul>
                <li>Excellence</li>
                <li>Teamwork</li>
                <li>Integrity</li>
                <li>Inclusivity</li>
                <li>Continuous Improvement</li>
            </ul>
        </section>

        <footer>
            <p>&copy; 2023 Sports Development System. All rights reserved.</p>
        </footer>
</body>

</html>