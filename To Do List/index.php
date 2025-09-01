<?php
    require_once "includes/displayTask.php";
?>

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
        <?php foreach ($tasks as $task): ?>
            <form action="includes/deleteTask.php" method="post">
                <label><?php echo htmlspecialchars($task['task']); ?></label>
                <input type="checkbox" name="" id="">
                <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                <button type="submit" name="delete">Delete</button>
            </form>
        <?php endforeach; ?>
    </div>
</body>
</html>