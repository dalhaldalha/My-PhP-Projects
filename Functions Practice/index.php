<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        session_start();

        echo "Welcome to the random number generator" . "<br>"
            . "Guess a number between 0 and 100" . "<br>";

        if (!isset($_SESSION["randomNumber"])) {
            $_SESSION["randomNumber"] = rand(0, 100);
        } 

        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $guess = htmlspecialchars($_POST["guess"]);
            $randomNumber = $_SESSION["randomNumber"];

            if ($guess == $randomNumber) {
                echo "Congratulations! You guessed the number: $randomNumber";
                unset($_SESSION["randomNumber"]); // Reset the game
            } else if ($guess < $randomNumber) {
                echo "Your guess is too low.";
            } else if ($guess > $randomNumber) {
                echo "Your guess is too high.";
            } else {
                echo "Your guess is invalid.";
            }

        }
    ?>
    
    <form action="" method="post">
        <label for="guess">Your Guess:</label>
        <input type="number" name="guess">
        <button type="submit">Submit</button>

    </form>

    
</body>
</html>
