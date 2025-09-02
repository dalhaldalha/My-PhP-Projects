<?php

    // Mark tasks as completed
        // Add a checkbox/button to mark a task as done.
        // Show completed tasks with a different style (e.g., strikethrough).
    

    // Task priorities
        // Add a priority level (e.g., High, Medium, Low) and sort tasks by priority.
    
    // Search and filter

    // Add a search bar to find tasks.
    // Filter tasks by status, priority, or category.
    // User authentication

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
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>
</head>
<body>
    <h1>To Do List</h1>
    <form action="includes/addTask.php" method="post">
        <input type="text" name="newTask" placeholder="Write a new task" required>
        
        <button type="submit">Add Task</button>
    </form>

    <form action="" method="post">
        <input type="text" name="searchTerm">
        <button type="submit" >Search</button>
    </form>

    <h2>Search Results</h2>
    <?php
        require_once "includes/searchTask.php";

        if (empty($results)) {
            echo "No Results";
        } else {

            var_dump($results);
            // foreach ($results as $result) {
            //     echo htmlspecialchars($result["task"] . "<br>");
            // }
        }
    ?>

    <div>
        <h2>All Tasks</h2>
        <div class="form-div">
            <?php foreach ($tasks as $task): ?>
                <form class="form" action="includes/deleteTask.php" method="post">
                    <label><?php echo htmlspecialchars($task['task']); ?></label>
                    <input type="checkbox" name="" id="">
                    <select name="priority" id="">
                        <option value="">High</option>
                        <option value="">Medium</option>
                        <option value="">Low</option>
                    </select>
                    
                    <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            <?php endforeach; ?>
        </div>
        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        // Select all checkboxes inside your task forms
        document.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Find the label in the same form as the checkbox
                const label = this.closest('form').querySelector('label');
                if (this.checked) {
                    label.style.textDecoration = "line-through";
                } else {
                    label.style.textDecoration = "none";
                }
            });
        });
    });
</script>
</body>
</html>