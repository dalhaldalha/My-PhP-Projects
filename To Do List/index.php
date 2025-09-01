<?php

    // Mark tasks as completed
        // Add a checkbox/button to mark a task as done.
        // Show completed tasks with a different style (e.g., strikethrough).

    // Edit tasks
        // Allow users to update the text of a task.
    
    // Task due dates
        // Let users set a due date for each task.
        // Highlight overdue tasks.

    // Task priorities
        // Add a priority level (e.g., High, Medium, Low) and sort tasks by priority.
    
    // Task categories or tags
    // Organize tasks by category (e.g., Work, Personal) or add tags.
    // Search and filter

    // Add a search bar to find tasks.
    // Filter tasks by status, priority, or category.
    // User authentication

    // Allow multiple users to have their own task lists.
    // Persistent completion status

    // Store whether a task is completed in the database.
    // Task count and progress bar

    // Show total tasks, completed tasks, and a progress bar.
    // Confirmation for deletion

    // Add a confirmation dialog before deleting a task.
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