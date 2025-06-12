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
        $expression = $_POST['expression'] ?? null;
        // echo "Your number is: " . $_POST['input'];

    ?>
    <h1>Calculator</h1>
    <form action="site.php" method="post">
        <button type="submit" name="input" value="1">1</button>
        <input type="hidden" name="input" value="<?php echo htmlspecialchars($input); ?>">
        <button type="submit" name="input" value="2">2</button>
        <input type="hidden" name="input" value="<?php echo htmlspecialchars($input); ?>">
        <input type="hidden" name="expression" value="<?php echo htmlspecialchars($input); ?>">
        <input readonly type="text" value="<?php echo htmlspecialchars($expression); ?>" placeholder="Enter a number">

    </form>

    
    
</body>

</html>