<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>To Do List</h1>
    <form action="includes/formhandler.inc.php" method="post">
        <input type="text" name="newTask" placeholder="Write a new task" required>
        
        <button type="submit">Add Task</button>
    </form>

    <div>
        <p>
            <?php

            
                require_once "includes/displayTask.php";

                // require_once "config/database.php";

                // $query = "SELECT * FROM tasks ORDER BY created_at DESC;";
                // $stmt = $pdo->prepare($query);
                // $stmt->execute();
                // $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);


                foreach ($tasks as $task) {
                    echo htmlspecialchars($task['task']) . "<br>";
                }
            ?>
        </p>
        <p>task 2</p>
        <p>task 3</p>
    </div>
</body>
</html>