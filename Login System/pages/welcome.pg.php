<?php

require_once "../config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/welcome.css">
    <title>User</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
    <div class="container">
        <div class="nav-brand">
        <a href="../index.php" class="site-txt">Penprofile</a>
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
    <!-- Main Content -->
    <main class="main-content">
        <div class="txt-div">
            <h2 class="hi-mg">Hi, <span class="user-name"><?php echo $_SESSION['user']; ?>!</span></h2>
        <p class="welcome-mg">Welcome back to your profile. How would you like to proceed with your session.</p>
        </div>
        <button class="proceed-btn">Proceed</button>
    </main>
</body>
</html>