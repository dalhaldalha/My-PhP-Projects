
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
                <option value="C">Celsius</option>
                <option value="F">Fahrenheit</option>
                <option value="K">Kelvin</option>
            </select> <br>
                
            <label for="to">To: </label> 
            <select name="to" id="">
                <option value="F">Fahrenheit</option>
                <option value="C">Celsius</option>
                <option value="K">Kelvin</option>
            </select> <br>

            <button type="submit">Calculate</button>
        </form>
    </div>

    <?php

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            function convertTemperature($value, $from, $to) {
                $value = $_POST["value"] ?? 0;
                $from = $_POST["from"] ?? " ";
                $to = $_POST["to"] ?? " ";


                // Checks if "from" is Celcius.
                if ($from == "C") {
                    switch ($to) {
                        case "C":
                            return "$value °C is equal to $value °C";
                            break;
                        case "F":
                            return "$value °C is equal to " . (($value*9/5)+32) . " °F";
                            break;
                        case "K":
                            return "$value °C is equal to " . ($value +273.15) . " K";
                            break;
                        default:
                            return "Invalid temperature scale selected.";
                            break;
                    }

                // Checks if "from" is Fahrenheit.
                } else if ($from == "F") {
                    switch ($to) {
                        case "C":
                            return "$value °F is equal to" . (($value-32)*5/9);
                            break;
                        case "F":
                            return "$value °F is equal to $value °F";
                            break;
                        case "K":
                            return "$value °F is equal to " . ((($value -32)/1.8)+273.15) . " K";
                            break;
                        default:
                            return "Invalid temperature scale selected.";
                            break;
                    }

                // Checks if "from" is Kelvin.
                } else if ($from == "K") {
                    switch ($to) {
                        case "C":
                            return "$value °K is equal to" . ($value - 273.15) . " °C";
                            break;
                        case "F":
                            return "$value °K is equal to" . (($value - 273.15) * 9/5 + 32) . " °F";
                            break;
                        case "K":
                            return "$value °K is equal to $value K";
                            break;
                        default:
                            return "Invalid temperature scale selected.";
                            break;
                    }

                // Default Output if non apply.
                } else {
                    return "Invalid temperature scale selected.";
                }

            }

            echo "<br>";
            // Call the function and display the result.
            echo convertTemperature($_POST["value"], $_POST["from"], $_POST["to"]);
        }
        
    ?>

</body>
</html>