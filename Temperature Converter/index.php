
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>Welcome to your go to Temperature converter</H1>
    <p>What would you like to covert today? </p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <label for="">Input</label>
        <input type="text">
    </form>
</body>
</html>