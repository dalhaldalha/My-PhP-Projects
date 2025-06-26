<?php 
//Trivia Quiz Algorithm
// 1. User inputs their name and selects a category. **
      // a. Store the username and category in a database. *
      // b. Redirect the user to the quiz page. *
// 2. On the quiz page, fetch questions from the database based on the selected category.
      // a. Display one question at a time.
      // b. Allow the user to select an answer and submit it.
      // c. Check the answer against the correct answer stored in the database.
// 3. Keep track of the user's score.
      // a. After each correct answer, store the score in a session variable.
      // b. After the last question, display the final score to the user.
// 4. Show the leaderboard with the top scores.
      //  a. Fetch the top scores from the database.
      //  b. Display the leaderboard on a separate page.
      //  c. Allow users to view their own score and the top scores.
// 5. Allow users to play again or exit the quiz.
      // a. Provide an option to restart the quiz with a new category but keep the same username unless they choose to change it.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/index.css">
    <title>Trivana</title>
</head>
<body>
    <h2>Welcome to Trivana</h2>
    <p>To start off, Input your name and select and category...</p>

    <form action="includes/formhandler.inc.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="general">General Knowledge</option>
            <option value="science">Science</option>
            <option value="history">History</option>
            <option value="maths">Maths</option>
        </select>
        <button type="submit">Start Quiz</button>
    </form>
    
</body>
</html>