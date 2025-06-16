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
    // How it should work:
    // 1. User Should be able to enter their weight and height.
    // 2. Program should be able to calculate BMI using the two inputs.
    // 3. Program Displays the BMI Value and tell you what class you fall into.
    // 4. Program should display all categories of BMI. together with repective colors. 

        $weight = $_Post['weight'] ?? '';
        $height = $_Post['height'] ?? '';

        echo $_Post['weight'] ?? 'Weight not set';
    ?>

    <form action="site.php" method='post'>
        <label for="weight">Weight (kg):</label>
        <input type="number" name="weight" placeholder="Enter your weight" required>
        <br><br>
        <label for="height">Height (m):</label>
        <input type="number" name="height" placeholder="Enter your height" required>

    </form>
</body>
</html>