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
// Calculator Algorithm
// 1. Display number buttons for the user to select the first number.
// 2. When a number is selected, store it in a variable.
// 3. Display operator buttons (+, -, *, /) for the user to select an operation.
// 4. When an operator is selected, store it in a variable and display number buttons for the second number.
// 5. When the second number is selected, store it in a variable.
// 6. Perform the calculation using the two numbers and the selected operator.
// 7. Display the result to the user.
// 8. Provide a button to clear/reset the calculator to start over.
// Extras
// 1. Allow the user to toggle between light and dark mode.
-->
    <?php
        $input = $_POST['input'] ?? null;
        $expression = $_POST['expression'] ?? '';
        
        if ($input !== null) {
            if ($input === 'C') {
                $expression = '';
            } elseif ($input === '+' || $input === '-' || $input === '*' || $input === '/') {
                $expression = '';
            } else {
                $expression .= $input;
                
            } 
        }
            

    ?>
    <h1>Calculator</h1>
    <form action="site.php" method="post">
        <input type="hidden" name="expression" value="<?php echo htmlspecialchars($expression); ?>">
        <input readonly type="text" value="<?php echo htmlspecialchars($expression); ?>" placeholder="Enter a number">
        <br>
        <button type="submit" name="input" value="1">1</button>
        <button type="submit" name="input" value="2">2</button>
        <button type="submit" name="input" value="3">3</button>
        <button type="submit" name="input" value="C">C</button>
        <br><br>
        <button type="submit" name="input" value="4">4</button>
        <button type="submit" name="input" value="5">5</button>
        <button type="submit" name="input" value="6">6</button>
        <br><br>
        <button type="submit" name="input" value="7">7</button>
        <button type="submit" name="input" value="8">8</button>
        <button type="submit" name="input" value="9">9</button>
        <br><br>
        <button type="submit" name="input" value="+">+</button>
        <button type="submit" name="input" value="-">-</button>
        <button type="submit" name="input" value="*">x</button>
        <button type="submit" name="input" value="/">/</button>
        <button type="submit" name="input" value="="></button>

        

    </form>

    
    
</body>

</html>