<?php 
session_start(); //Starts session

    try { 
        require_once "../includes/dbh.inc.php"; // Links to the codes in the database connection page.

        $query = "SELECT * FROM questions;"; //Does an SQL query to select all from the questions table.
        $stmt = $pdo->prepare($query); //This line is responsible for sumbiting the query into the database.
        $stmt->execute(); // This line Finally excutes the Query.
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC); //This line fetches ALl the results

        //Resets all values to null
        $pdo = null;
        $stmt = null;

        

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage()); // 
    }

    // $currentQuestionIndex = 0;
    $numberOfQuestions = count($results);
    $_SESSION['score'] = 0;
    $userAnswer = $_POST["answer"] ?? null;

    $_SESSION['currentQuestionIndex'] = 1;


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
    <p>Hi, User</p> <br>
    <section class="container">
        <h2 class="heading-txt">General Knowledge</h2>
        
        <?php for ($i = 0; $i < $_SESSION['currentQuestionIndex']; $i++): ?>
        <p class="question-p"><?php echo $results[$i]["question_text"]; ?></p>

        <form action="" method="post">
            <button type="submit" name="option" value="A">A</button>
            <button type="sumbit" name="option" value="B">B</button>
            <button type="sumbit" name="option" value="C">C</button>
            <button type="sumbit" name="option" value="D">D</button>
        </form>

        <form action="" method="post">
            <button type="submit" name="step" value="P">Previous</button>
            <button type="submit" name="step" value="N">Next</button>
        </form>

        <?php
            if ($_SERVER['REQUEST_METHOD']= "POST") {
                $usersOption = $_POST["option"] ?? null;
                $userStep  = $_POST["step"] ?? null;
                
                $correctAnswer = "D";

                if ($userStep === "N") {
                    $i = $i++;
                    echo  $results[$i]['question_text'];
                }

                echo "You selected option: " . $usersOption . "<br>";
                if ($usersOption === $correctAnswer) {
                    echo "Correct Answer!" . $userStep;

                    // $_SESSION['currentQuestionIndex'] ++;
                } else {
                    echo "Wrong Answer!";
                }

            } else {
                header("Location: ../categories/general.cat.php");
            }


            
        ?>


        <?php endfor; ?>
        

        <!-- <?php for ($i = 0; $i < $_SESSION['currentQuestionIndex']; $i ++): ?>
            
            <h2 class="heading-txt"><?php echo htmlspecialchars($results["name"]); ?></h2>
            <p class="question-p"><?php echo $results2[$i]["question_text"]; ?></p>
            <form action="" method="post" class="options-container">
                <button type="submit" class="option_1 options" name="answer" value="A"><?php echo $results2[$i]['A']; ?></button>
                <button type="submit" class="option_2 options" name="answer" value="B"> <?php echo $results2[$i]['B']; ?></button>
                <button type="submit" class="option_3 options" name="answer" value="C"> <?php echo $results2[$i]['C']; ?></button>
                <button type="submit" class="option_4 options" name="answer" value="D"> <?php echo $results2[$i]['D']; ?></button>
            </form>
            

            <?php 
                // Check if the user has submitted an answer.
                if(isset($userAnswer)) {
                    $correctAnswer = $results2[$i]["correct_option"];
                    if ($userAnswer === $correctAnswer) {
                        echo "Correct! <br>";
                        $_SESSION['score'] ++;
                    } else {
                        echo "Incorrect! The correct answer is: " . $_SESSION['score'] . "<br>";
                    }
                }
                
                // Increment the current question index.
                if ($_SESSION['currentQuestionIndex'] < $numberOfQuestions) {
                    $_SESSION['currentQuestionIndex'] ++;
                } else {
                    echo "Your score is: " . $_SESSION['score'] . " out of " . $numberOfQuestions . "<br>";
                }


            ?>

            

            
        <?php endfor; ?> -->
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