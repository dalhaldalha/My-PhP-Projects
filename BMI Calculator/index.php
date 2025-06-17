<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
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

        $weight = (float)$_POST['weight'];
        $height = (float)$_POST['height'];
        $BMI = $weight/ ($height ** 2);
        
    ?>

    <form action="site.php" method='post'>
        <label for="weight">Weight (kg):</label>
        <input type="number" name="weight" step="0.01" min="0.01" placeholder="Enter your weight" required>
        <br><br>
        <label for="height">Height (m):</label>
        <input type="number" name="height" step="0.01" min="0.01" placeholder="Enter your height" required>
        <br>
        <button type="submit">Calculate BMI</button> 
    </form>
    <br>
    <?php
        echo round($BMI, 2);
    ?>

    <div class="bmi-category">
        <div class="category-1 borders">
            <p>Underweight</p>
            <p>< 18.5</p>
        </div>
        <div class="category-2 borders">
            <p>Underweight</p>
            <p>18.5 - 25</p>
        </div>
        <div class="category-3 borders">
            <p>Underweight</p>
            <p>25 - 30</p>
        </div>
        <div class="category-4 borders">
            <p>Underweight</p>
            <p>> 30</p>
        </div>
    </div>
</body>
</html>