<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["files/site.php"]) ?>" method="post">
        <label for="userName">Your Username:</label>
        <input type="text" name=userName>
        <br>
        <label for="password">Your Password:</label>
        <input type="number" name=password>
        <br>
        <button type="submit">Submit</button>
    </form>
    <?php
   $a = 2;

   $result = match ($a) {
    2=> "Hi",
    3=> "Bye",
    1=> "Correct",
    default => "Wrong value",
   };

    echo $result;
    ?>
</body>
</html>
