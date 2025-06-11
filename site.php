<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode Calculator</title>
    <link rel="stylesheet" href="style/site.css">
</head>
<body>   
<!--
// Caluculator Progression
// 1. User inputs should be able to select a number.
// 2. Inputs should be able to be stored in variables.
// 3. User should be able to select an operatoin.
// 4. User should be able to see the result of the operation.
// 5. User should be able to clear the inputs and results.
// Extras
// 1. User should be able to select a theme (dark mode).
-->
    <div>
        
    </div>
    <?php
        $num1 = $_POST['num1'] ?? null;
        $num2 = $_POST['num2'] ?? null;
        $operator = $_POST['operator'] ?? null;
        $result = null;
        
        if ($num1 !== null && $num2 !== null && $operator !== null) {
            switch ($operator) {
                case '+':
                    $result = $num1 + $num2;
                    break;
                case '-':
                    $result = $num1 - $num2;
                    break;
                case '*':
                    $result = $num1 * $num2;
                    break;
                case '/':
                    $result = $num1 / $num2;
                    break;
                default:
                    $result = "Invalid operator";
                    break;
                }         
            }
    ?>
    <h1>Calculator</h1>
    <form action="site.php" method="post" >
        <!-- <input type="number" name="num1" required>
        <input type="number" name="num2" required>
    
        <button type="submit" name="operator" value="+">+</button>
        <button type="submit" name="operator" value="-">-</button>
        <button type="submit" name="operator" value="*">x</button>
        <button type="submit" name="operator" value="/">/</button> -->
        
        <!-- User inputs  -->
        <button type="submit" value="1" name="num1">1</button>
        <button type="submit" value="2" name="num2">2</button>
        <button type="submit" value="+" name="operator">+</button>
        <button type="submit" value="-" name="operator">-</button>
        <button type="submit" value="*" name="operator">x</button>
        <button type="submit" value="/" name="operator">/</button>


        <!-- Inputs Coverted to Hidden -->
        <?php if ($num1 !== null || $num2 !== null) : ?>
            <input type="hidden" name="num1" value="<?php echo $num1; ?>">
            <input type="hidden" name="num2" value="<?php echo $num2; ?>">
        <?php endif; ?>

    </form>
        
</body>

</html>