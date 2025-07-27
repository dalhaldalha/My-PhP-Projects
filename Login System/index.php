<?php
// Algorithm for Login System
//#1.Main Page schould give you the option for If your want to Login or sign Up.
//  #a.Login button should take you to a login page.
//  #b.Sign Up button should take you to a sign up page.
//#2. User should be able to input their personal details to sign up.
//  #a.Make sure that username, email and passowrd are required.
//  #b.All details should be stored in the database.
//  #c.Passwords should be hashed once created before storing in the database.
//  #d.Once all fields are created, user should be taken back to Login Page.
// 3. User should be able to login with either a suername or an email, with a password.
//  #a.If all details match, User should be taken to a welcome screeen.
// Bonus Futers:
// 1. User Should pass a captcha test before being able to sign up.
// 2. User should be able to reset their password if they forget it.
// 3. Sign up fields should be able to securely required.


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.png" type="image/png">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/index.css">
    <title>Penprofile</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
    <div class="container">
        <div class="nav-brand">
        <a href="#" class="site-txt">Penprofile</a>
        </div>
        
        <nav class="nav-menu">
            <a href="#" class="nav-link">Home</a>
            <a href="#" class="nav-link">Education <span class="dropdown-arrow"><img src="assets/dropdown.png" alt="" style="width:12px;height:12px;"></span></a>
            <a href="#" class="nav-link">Innovation <span class="dropdown-arrow"><img src="assets/dropdown.png" alt="" style="width:12px;height:12px;"></span></a>
            <a href="#" class="nav-link">Productivity <span class="dropdown-arrow"><img src="assets/dropdown.png" alt="" style="width:12px;height:12px;"></span></a>
            <a href="#" class="nav-link">News <span class="dropdown-arrow"><img src="assets/dropdown.png" alt="" style="width:12px;height:12px;"></span></a>
        </nav>

        <div class="nav-icons">
            <button class="icon-btn"> <img src="assets/user.png" alt="" style="width:20px;height:20px;"> </i></button>
            <button class="icon-btn"> <img src="assets/bell.png" alt="" style="width:20px;height:20px;"> </button>
            <button class="icon-btn"> <img src="assets/search.png" alt="" style="width:20px;height:20px;"> </button>
            <button class="icon-btn"> <img src="assets/menu.png" alt="" style="width:20px;height:20px;"></button>
        </div>
    </div>
    </header>

    <main class="main-content">
        <div class="welcome-container">
            <h2 class="header-txt">Welcome to Penprofile</h2>
            <p class="sub-txt">How would you like to proceed?</p>
        </div>
        

        <form class="form" action="includes/formhandler.inc.php" method="post">
            <button class="signup-btn" type="submit" name="login">Login</button>
            <button class="signup-btn" type="submit" name="signUp">Sign Up</button>
        </form>
    </main>

    


</body>
</html>