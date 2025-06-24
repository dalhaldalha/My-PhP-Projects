<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3> Change account</h3>

    <form action="includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder="Username"> <br>
        <input type="password" name="pwd" placeholder="Password"> <br>
        <input type="text" name="email" placeholder="Email"> <br>
        <button>Signup</button>
    </form>

    <h3>Delete Account</h3>

    <form action="includes/userdelete.inc.php" method="post">
        <input type="text" name="username" placeholder="Username"> <br>
        <input type="password" name="pwd" placeholder="Password"> <br>
        <button>Delete</button>
    </form>
</body>
</html>