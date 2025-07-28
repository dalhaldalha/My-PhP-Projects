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

    // Initialize session variables
    $numberOfQuestions = count($results);
    $_SESSION['score'] = 0;
    $userAnswer = $_POST["answer"] ?? null;
    $_SESSION['currentQuestionIndex']; 

    if (!isset($_SESSION['currentQuestionIndex'])) {
        $_SESSION['currentQuestionIndex'] = 0;
    } else if ($_SESSION['currentQuestionIndex'] > $numberOfQuestions) {
        $_SESSION['currentQuestionIndex'] = 0;
    } 

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['option'])) {

            echo "You selected option: " . htmlspecialchars($_POST['option']) . "<br>";
        }

        if (isset($_POST['step'])) {
            if ($_POST['step'] == "N" && $_SESSION['currentQuestionIndex'] < $numberOfQuestions) {
                $_SESSION['currentQuestionIndex'] ++;


                echo "Next question: " . $_SESSION['currentQuestionIndex'] . "<br>";
            } else if ($_POST['step'] == "P" && $_SESSION['currentQuestionIndex'] > 0) {
                $_SESSION['currentQuestionIndex'] --;

                echo "Next question: " . $_SESSION['currentQuestionIndex'] . "<br>";
            }
        }

    }


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
            
            <p class="question-p"><?php echo $results[$_SESSION['currentQuestionIndex']]["question_text"]; ?></p>

            <form action="" method="post">
                <button type="submit" name="option" value="A">A</button>
                <button type="submit" name="option" value="B">B</button>
                <button type="submit" name="option" value="C">C</button>
                <button type="submit" name="option" value="D">D</button>
                <button type="submit" name="step" value="P">Previous</button>
                <button type="submit" name="step" value="N">Next</button>
            </form>
            
        </section>
    </body>
</html>