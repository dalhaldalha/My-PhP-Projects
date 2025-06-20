
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>
<body>
    <?php 
    // 1. User should be able to input a number preferable a float type. **
    // 2. User should be able to select "from" what "to" what temperature the wish to covert.
    // 3. A submit button to submit the input and calculate.
    // 4. The correct output in "to".
    ?>
    <div class="temperatureConverter">
        <H1>Welcome to your go to Temperature converter</H1>
        <p>What would you like to covert today? &#128516;</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <label for="value">Value to Convert</label> <br>
            <input type="number" name="value" step="0.01"> <br>
            <label for="from">From: </label> <br>
            <select name="from" id="from">
                <option value="Celsius">Celsius</option>
                <option value="Fahrenheit">Fahrenheit</option>
                <option value="Kelvin">Kelvin</option>
            </select> <br>
                
            <label for="to">To: </label> 
            <select name="to" id="">
                <option value="Fahrenheit">Fahrenheit</option>
                <option value="Celsius">Celsius</option>
                <option value="Kelvin">Kelvin</option>
            </select> <br>

            <button type="submit">Calculate</button>
        </form>
    </div>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 1. Get the input value
            $value = $_POST["value"];
            // 2. Get the "from" and "to" values
            $from = $_POST["from"];
            $to = $_POST["to"];
        }
    ?>

</body>
</html>