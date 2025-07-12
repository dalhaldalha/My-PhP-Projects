<?php
// Algorithm for Login System
// 1.Main Page schould give you the option for If your want to Login or sign Up.
//   a.Login button should take you to a login page.
//   b. Sign Up button should take you to a sign up page.
// 2. User should be able to input their personal details to sign up.
//   a.Make sure that username, email and passowrd are required.
//   b.All details should be stored in the database.
//   c.Passwords should be hashed once created before storing in the database.
//   d.Once all fields are created, user should be taken back to Login Page.
// 3. User should be able to login with either a suername or an email, with a password.
//   a.If all details match, User should be taken to a welcome screeen.
require_once 'config.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Welcome to Penprofile</h2>
    <p>How would you like to proceed?</p>

    <form action="inludes/formhandler.inc.php" method="post">
        <button type="sumbit" name="login">Login</button>
        <button type="submut" name="signUp">Sign Up</button>
    </form>


</body>
</html>