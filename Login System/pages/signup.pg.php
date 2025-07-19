<?php
    // require_once '../config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/signup.css">
    <title>Sign Up</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
    <div class="container">
        <div class="nav-brand">
        <h1>Penprofile</h1>
        </div>
        
        <nav class="nav-menu">
            <a href="#" class="nav-link">Home</a>
            <a href="#" class="nav-link">Education <span class="dropdown-arrow"><img src="../assets/dropdown.png" alt="" style="width:12px;height:12px;"></span></a>
            <a href="#" class="nav-link">Innovation <span class="dropdown-arrow"><img src="../assets/dropdown.png" alt="" style="width:12px;height:12px;"></span></a>
            <a href="#" class="nav-link">Productivity <span class="dropdown-arrow"><img src="../assets/dropdown.png" alt="" style="width:12px;height:12px;"></span></a>
            <a href="#" class="nav-link">News <span class="dropdown-arrow"><img src="../assets/dropdown.png" alt="" style="width:12px;height:12px;"></span></a>
        </nav>

        <div class="nav-icons">
            <button class="icon-btn"> <img src="../assets/user.png" alt="" style="width:20px;height:20px;"> </i></button>
            <button class="icon-btn"> <img src="../assets/bell.png" alt="" style="width:20px;height:20px;"> </button>
            <button class="icon-btn"> <img src="../assets/search.png" alt="" style="width:20px;height:20px;"> </button>
            <button class="icon-btn"> <img src="../assets/menu.png" alt="" style="width:20px;height:20px;"></button>
        </div>
    </div>
    </header>

    <main class="main-content">

        <h2>Sign Up</h2>
        <p>Tell us about yourself</p>
        <form class="signup-form" action="../includes/signup.fh.inc.php" method="post">
            <input required type="text" name="username" placeholder="username">
            <input required type="email" name="email" placeholder="email">
            <input type="text" name="firstName" placeholder="First Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input required type="password" name="pwd" placeholder="password">
            <button type="submit">Sign Up</button>
        </form>
    </main>

</body>
</html>