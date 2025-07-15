<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <p>Tell us about yourself</p>
    <form action="../includes/signup.fh.inc.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="email" name="email" placeholder="email">
        <input type="text" name="firstName" placeholder="First Name">
        <input type="text" name="lastName" placeholder="Last Name">
        <input type="password" name="pwd" placeholder="password">
        <button type="submit">Sign Up</button>
    </form>

</body>
</html>