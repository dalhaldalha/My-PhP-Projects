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
    <div class="task-div">
        <form class="add-task" action="includes/addTask.php" method="post">
            <input class="text-area" type="text" name="newTask" placeholder="Write a new task" required>
            
            <button class="add-task-btn" type="submit">&#43;</button>
        </form>

        <!-- <form action="" method="post">
            <input type="text" name="searchTerm">
            <button type="submit" >Search</button>
        </form> -->

        <!-- <h2>Search Results</h2> -->
        <!-- <?php
            // require_once "includes/searchTask.php";

            // if (empty($results)) {
            //     echo "No Results";
            // } else {

            //     var_dump($results);
            //     // foreach ($results as $result) {
            //     //     echo htmlspecialchars($result["task"] . "<br>");
            //     // }
            // }
        ?> -->

        <div class="all-task-div, task-list">
            <h2>All Tasks</h2>
            <div class="form-di">
                <?php foreach ($tasks as $task): ?>
                    <form class="each-task" action="includes/deleteTask.php" method="post">
                        <input class="checkbox" type="checkbox" name="" id="">
                        <label class="task-content"><?php echo htmlspecialchars($task['task']); ?></label>
                        <!-- <select name="priority" id="">
                            <option value="">High</option>
                            <option value="">Medium</option>
                            <option value="">Low</option>
                        </select> -->
                        
                        <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                        <button class="delete-btn" type="submit" name="delete"> <img class="trash-can-icon" src="assets/trash-can.png" alt="Trash-Can"> </button>
                    </form>
                <?php endforeach; ?>
            </div>
        </div>

        <form action="includes/exportTask.php" method="post">
            <button type="submit">Export Tasks</button>
        </form>
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