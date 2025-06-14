<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark Mode Calculator</title>
    <link rel="stylesheet" href="style/site.css">
</head>
<body>   
<?php
// Calculator Algorithm
// 1. Display all number and operator buttons (+, -, *, /), as well as "=", and "C" (clear) on the screen.
// 2. When a button is clicked, its value is sent to the server as 'input'.
// 3. If a number is clicked, append it to the current expression.
// 4. If an operator is clicked, append it to the expression only if the expression is not empty and the last character is not already an operator.
// 5. If "C" is clicked, clear the expression.
// 6. If "=" is clicked, check that the expression is valid (does not end with an operator).
//    a. If valid, evaluate the expression and display the result.
//    b. If invalid, display an error message.
// 7. Store the current expression in a hidden input so it persists between button clicks.
// 8. Display the current expression or result in a readonly input box.
// Extras
// 1. Allow the user to toggle between light and dark mode.

        $input = $_POST['input'] ?? null;
        $expression = $_POST['expression'] ?? '';
        $lastChar = substr($expression, -1);
        $opr = ['+', '-', '*', '/'];
        
        
        if ($input !== null) {
            if ($input === 'C') {
                $expression = '';
            } elseif (in_array($input, $opr)){
                if($expression !== '' && !in_array($lastChar, $opr)) {
                    $expression .= $input;
                }

            } elseif($input === '='){
                if ($lastChar !== '' && !in_array($lastChar, $opr)){
                    $expression = eval('return ' . $expression .  ';');
                } else {
                    $expression = 'Error: Invalid Expression';
                }
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
        <button type="submit" name="input" value="=">=</button> 

    </form>

    
    
</body>

</html>