<?php 
session_start(); //Starts session

    try { 
        require_once "../includes/dbh.inc.php"; // Links to the codes in the database connection page.

        //First Query
        $query = "SELECT name FROM categories WHERE name = :category;"; // Does a SQL query to SELECT a category inside the database categories.
        $stmt = $pdo->prepare($query); //This line is responsible for sumbiting the query into the database.
        $stmt->bindParam(":category", $_SESSION["category"]); //Binds the user category to the database "categories
        $stmt->execute(); // This line Final excutes the Query.
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        //Second Query
        $query2 = "SELECT * FROM questions;";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->execute();
        $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        //Resets all values to null
        $pdo = null;
        $stmt = null;

        

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage()); // 
    }

    $currentQuestionIndex = 0;
    $numberOfQuestions = count($results2);
    $score = 0;
    $userAnswer = $_POST["answer"] ?? null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/reset.css">
    <link rel="stylesheet" href="../styles/general.css">
    <title>General Knowledge</title>
</head>
<body>
    <p>Hi, <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : "User"; ?></p> <br>
    <section class="container">
        <?php for ($i = 0; $i <$numberOfQuestions; $i++): ?>
            <h2 class="heading-txt"><?php echo htmlspecialchars($results["name"]); ?></h2>
            <p class="question-p"><?php echo $results2[$i]["question_text"]; ?></p>
            <form action="" method="post" class="options-container">
                <button type="submit" class="option_1 options" name="answer" value="A"><?php echo $results2[$i]['A']; ?></button>
                <button type="submit" class="option_2 options" name="answer" value="B"> <?php echo $results2[$i]['B']; ?></button>
                <button type="submit" class="option_3 options" name="answer" value="C"> <?php echo $results2[$i]['C']; ?></button>
                <button type="submit" class="option_4 options" name="answer" value="D"> <?php echo $results2[$i]['D']; ?></button>
            <form>

            <?php 
                if(isset($userAnswer)) {
                    $correctAnswer = $results2[$i]["correct_option"];
                    if ($userAnswer === $correctAnswer) {
                        echo "Correct! <br>";
                        $score++;
                    } else {
                        echo "Incorrect! The correct answer is: " . htmlspecialchars($correctAnswer) . "<br>";
                    }
                }
            ?>

            
        <?php endfor; ?>
    </section>

    <?php 

         // Gets the user's answer from the form submission
        // $currentQuestionIndex = 0;
        // $numberOfQuestions = count($results2);
        // $score = 0;

        // while ($currentQuestionIndex < $numberOfQuestions) {
        //     echo $results2[$currentQuestionIndex]["question_text"] . "<br>";
        //     echo $results2[$currentQuestionIndex]["A"] . "<br>";
        //     echo $results2[$currentQuestionIndex]["B"] . "<br>";
        //     echo $results2[$currentQuestionIndex]["C"] . "<br>";
        //     echo $results2[$currentQuestionIndex]["D"] . "<br>";
        //     echo "<br>";
        //     $userAnswer = "10"; // This variable will store the user's answer
        //     $correctAnswer = $results2[$currentQuestionIndex]["correct_option"];

        //     if ($userAnswer === $correctAnswer) {
        //         echo "Correct! <br>";
        //         $score ++;
        //     } else {
        //         echo "Incorrect! The correct answer is: " . htmlspecialchars($correctAnswer) . "<br>";
        //     }


        //     $currentQuestionIndex ++ ; 
        // }

        // echo "Your score is: " . $score . " out of " . $numberOfQuestions . "<br>";
    ?>
</body>
</html>