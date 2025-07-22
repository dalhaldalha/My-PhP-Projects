<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/logo.png" type="image/png">
    <link rel="stylesheet" href="../styles/header.css">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Document</title>
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
        <!-- Logo Icon -->
        <div class="logo-container">
            <div><img src="../assets/logo.png" alt="" style="width:6rem;height:6rem;"></div>
        </div>

        <!-- Tagline -->
        <h2 class="tagline">Read . Connect . Write</h2>

        <!-- Login Form -->
        
        <form class="login-form" action="../includes/login.fh.inc.php" method="post">
            <div class="input-group">
                <input class="form-input" type="email" name="email" placeholder="Email" required>
            </div>

            <div class="input-group password-group">
                <input class="form-input" id="password" type="password" name="pwd" placeholder="Password" required>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" class="checkbox">
                <label for="remember" class="checkbox-label">Remember Me</label>
            </div>
            <button class="login-btn" type="submit">Login</button>

            <div class="form-footer">
                <a href="signup.pg.php" class="footer-link">Register</a>
                <span class="separator">|</span>
                <a href="#" class="footer-link">Lost your password?</a>
            </div>
        </form>
    </main>
</body>
</html>