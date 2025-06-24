<?php 
//Trivia Quiz Algorithm
// 1.
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

    <form action="" method="post">
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