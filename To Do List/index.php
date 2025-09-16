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
        //User should be able to star a task. And store in database
        //There should be a filter option that:
            //Order by created date.
            //Odered by Priority.
        //Everything should be saved in sessinos so that even after a page reload, the tasks stay the same.

        
    require_once "includes/displayTask.php";
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

    <script>

        $(document).on("click", ".starIcon", function(){
            $(this).toggleClass("starIconActive");
            let priority = $(this).hasClass("starIconActive") ? 1 : 0;
            let id = $(this).data("id");
            console.log("Task: ", id);
            console.log("Priority: ", priority);
        });


        // $(document).ready(function(){

        //     $(".starIcon").on("click", function(){
        //         $(this).toggleClass("starIconActive");
        //         let priority = $(this).hasClass("starIconActive") ? 1 : 0;
        //         let id = $(this).data("id");
        //         console.log("Task: ", id);
        //         console.log("Priority: ", priority);
        //     });
        // });


    </script>

</head>
<body>
    <h1>To Do List</h1>
    <div class="task-div">
        <form class="add-task" action="includes/addTask.php" method="post">
            <input class="text-area" type="text" name="newTask" placeholder="Write a new task" required>
            <button class="add-task-btn" type="submit">&#43;</button>
        </form>
        
        <div class="all-task-div, task-list">
            <h2>All Tasks</h2>
            <div class="form-div">
                <div id="tasks">
                    <?php
                    if ($numRows > 0) {
                        foreach ($tasks as $task) {
                            echo "<div class='each-task deleteClass'>";
                                echo "<div class='end-to-end'>";
                                    echo "<input data-id='" . $task["id"] . "' class='checkbox' type='checkbox'>";
                                    echo "<p class='taskContent'>";
                                        echo $task["task"];
                                    echo "</p>";
                                echo "</div>";
                                echo "<div class='end-to-end'>";
                                    echo "<svg data-id='" . $task["id"] . "' class='starIcon' xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='transparent' viewBox='0 0 24 24' stroke='hsl(272, 81%, 47%)'>";
                                        echo "<path d='M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z'/>";
                                    echo "</svg>";
                                    // echo "<select data-id='" . $task["id"] . "' id='priority' class='priority'>";
                                    //     echo "<option value='' disabled selected>Select Priority</option>";
                                    //     echo "<option  value='high' class='priority-high'>High</option>";
                                    //     echo "<option  value='medium' class='priority-medium'>Medium</option>";
                                    //     echo "<option  value='low' class='priority-low'>Low</option>";
                                    // echo "</select>";
                                    echo "<button data-id='" . $task["id"] . "' class='delete-btn' type='submit' name='delete'>";
                                        echo "<svg class='trash-can-icon'  xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>";
                                            echo "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>";
                                            echo "<path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>";
                                        echo "</svg>";
                                    echo "</button>";

                                echo "</div>";
                            echo "</div>";
                            
                            
                        }
                            
                    } else {
                        // echo "You have no tasks";
                    }
                    ?>
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