<?php

    //Today's Tasks:
        //If there are no tasks in the database, Show a message saying that all your tasks are completed.
        //Differentiate between the list for Uncomplete and Completed tasks.
            //Should be able to toggle between the two types of tasks to be shown or hidden.
            //Completed tasks should show up at the top.
                //Completed tasks should log, the date and time it was completed.
            //Uncompleted tasks should show up at the bottom.
            //Checking or unchecking a task adds it to  either the completed or uncompleted sections.
        //Adding task is dynamic, meaning it doesn't require a page reload.
        /*User should be able to star a task. And store in database*/
        //There should be a filter option that:
            //Order by created date.
            //Odered by Priority.
        //Everything should be saved in sessinos so that even after a page reload, the tasks stay the same.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Document</title>

    <!-- Load jQuery from Locally -->
    <script src="js/jquery-3.7.1.js"></script>
    <!-- Load Script that strikes through text as checkbox is checked -->
    <script src="js/strike-through.js"></script>\
    <!-- Load Script that monitors the status of a task -->
    <script src="js/status-check.js"></script>
    <!-- Load Script that Deletes Task When Trash icon is clicked -->
    <script src="js/deleteTask.js"></script>
    <!-- Load Script that styles the priority of a task -->
    <script src="js/taskPriority.js"></script>
    <!-- Load Script that loads more tasks -->
    <script src="js/loadTasks.js"></script>

    <!-- Load Script that diplays the tasks and adds new Tasks tasks dynamically -->
    <script src="js/display&addTask.js"></script>

    <script>

    </script>

</head>
<body>
    <h1>To Do List</h1>
    <div class="task-div">
        <form id="addForm" class="add-task" action="includes/addTask.php" method="post">
            <input class="text-area" type="text" name="newTask" placeholder="Write a new task" required>
            <button class="add-task-btn" type="submit">&#43;</button>
        </form>
        
        <div class="all-task-div, task-list">
            <h2>All Tasks</h2>
            <div class="form-div">
                <div id="tasks">
                    
                </div>
            </div>
        </div>

        <div class="task-footer">
            <form action="includes/exportTask.php" method="post">
                <button class="export-btn" type="submit">Export All Tasks</button>
            </form>

            <button id="loadBtn" class="load-more">Load more tasks...</button>
        </div>
        
    </div>
</body>
</html>