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
        $stmt2->excute();

        $results2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;

        

    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage()); // 
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
    <p>Hi, <?php echo isset($_SESSION["username"]) ? htmlspecialchars($_SESSION["username"]) : "User"; ?></p> <br>
    <section class="container">
        <h2 class="heading-txt"><?php echo htmlspecialchars($results["name"]) ?></h2>
        <p class="question-p">What is the capital of Australia?</p>
        <div class="options-container">
            <button class="option_1 options">option 1</button>
            <button class="option_2 options">option 2</button>
            <button class="option_3 options">option 3</button>
            <button class="option_4 options">option 4</button>
        </div>

    </section>
</body>
</html>