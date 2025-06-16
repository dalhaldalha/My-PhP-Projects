<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI App</title>
</head>
<body>
    Calculate your BMI:
    <?php 
    $weight = $_Post['weight'] ?? '';
    $height = $_Post['height'] ?? '';
    ?>

    <form action="site.php" method='post'>
        <label for="weight">Weight (kg):</label>
        

    </form>
</body>
</html>