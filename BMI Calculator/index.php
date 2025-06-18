<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index.css">
    <title>BMI App</title>
</head>
<body>
    <h1>Calculate your BMI:</h1>
    <?php 
    $BMI = null;
    $category = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $weight = (float)($_POST['weight'] ?? 0);
        $height = (float)($_POST['height'] ?? 0);
        if ($weight > 0 && $height > 0) {
            $BMI = $weight / ($height ** 2);
            if ($BMI < 18.5) $category = "Underweight";
            elseif ($BMI < 25) $category = "Normal Weight";
            elseif ($BMI < 30) $category = "Overweight";
            else $category = "Obese";
        } else {
            echo "<p style='color:red;'>Please enter valid weight and height.</p>";
        }
    }
    ?>

    <form action="index.php" method='post'>
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
        if ($BMI) {
            echo "<p>Your BMI is: <strong>" . round($BMI, 2) . "</strong></p>";
            echo "<p>Category: <strong>$category</strong></p>";
        }
    ?>

    <div class="bmi-category">
        <div class="category-1 borders">
            <p>Underweight</p>
            <p>&lt; 18.5</p>
        </div>
        <div class="category-2 borders">
            <p>Normal Weight</p>
            <p>18.5 - 24.9</p>
        </div>
        <div class="category-3 borders">
            <p>Overweight</p>
            <p>25 - 29.9</p>
        </div>
        <div class="category-4 borders">
            <p>Obese</p>
            <p>&ge; 30</p>
        </div>
    </div>
</body>
</html>