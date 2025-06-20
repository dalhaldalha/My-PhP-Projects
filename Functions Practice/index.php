<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        echo "Welcome to the random number generator" . "<br>"
            . "Guess a number between 0 and 100" . "<br>";

        if (!isset($_SESSION["randomNumber"])) {
            $_SESSION["randomNumber"] = floatval(rand(0, 100));
        } 


        
    ?>
    
    <form action="" method="post">
        <label for="guess">Your Guess:</label>
        <input type="number" name="guess">
        <button type="submit">Submit</button>

    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $guess = htmlspecialchars($_POST["guess"]);
            $randomNumber = $_SESSION["randomNumber"];

            if ($guess == $randomNumber) {
                echo "Congratulations! You guessed the number: $randomNumber" . "<br>";
                unset($_SESSION["randomNumber"]); // Reset the game
            } else if ($guess < $randomNumber) {
                echo "Your guess is too low." . "<br>";
            } else if ($guess > $randomNumber) {
                echo "Your guess is too high." . "<br>";
            } else {
                echo "Your guess is invalid.";
            }
            
            print_r($_SESSION) .  "<br>"; 
        }
    ?>
    
</body>
</html>