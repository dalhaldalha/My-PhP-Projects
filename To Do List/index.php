<?php

    //Today's Tasks:
        /*If there are no tasks in the database, Show a message saying that all your tasks are completed.*/
        //Differentiate between the list for Uncomplete and Completed tasks.
            //Should be able to toggle between the two types of tasks to be shown or hidden.
            //Completed tasks should show up at the top.
                //Completed tasks should log, the date and time it was completed.
            //Uncompleted tasks should show up at the bottom.
            //Checking or unchecking a task adds it to  either the completed or uncompleted sections.
        /*Adding task is dynamic, meaning it doesn't require a page reload.*/
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
        function fetchTasks(){
            $.ajax({
                url: "includes/firstTasks.php",
                type: "POST",
                dataType: "json",

                success: function(tasks){
                    console.log("AJAX success: ", tasks);
                    

                    //Determines how each task from the database is displayed
                    $("#tasks").empty();
                    tasks.forEach(function(task){
                        let firstTasks = `
                            <div class='each-task deleteClass'>
                                <div class='end-to-end'>
                                    <input data-id='${task.id}' class='checkbox' type='checkbox'>
                                    <p class='taskContent'>
                                        ${task.task}
                                    </p>
                                </div>
                                <div class='end-to-end'>
                                    <svg data-id='${task.id}' class='starIcon' xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='transparent' viewBox='0 0 24 24' stroke='hsl(272, 81%, 47%)'>
                                        <path d='M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z'/>
                                    </svg>
                                    <button data-id='${task.id}' class='delete-btn' type='submit' name='delete'>
                                        <svg class='trash-can-icon'  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                            <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                            <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                        </svg>
                                    </button>

                                </div>
                            </div>
                        `;
                        $("#tasks").append(firstTasks);
                    });


                    //If there are zero Tasks, a, tasks are completed message will be shown.
                    let numOfTasks = $(tasks).length;
                    console.log("Number of Tasks: ", numOfTasks);
                    if(numOfTasks === 0 ) {
                        let completedText = `
                            <div class="completed-div">
                                <img src="assets/checkMark.svg" alt="" class="completed-img">
                                <p>Your tasks are completed!!</p>
                            </div>
                        
                        `;

                        $("#tasks").append(completedText);
                    }

                },
                error: function(xhr, status, error){
                    console.error("AJAX Error: ", status, error);
                }

            });
        }

        $(document).ready(function(){
            $(".completedTasks").click(function(){
                console.log("Completed Tasks have been clicked");
                $(".completeTasks-div").slideToggle("hiddenDiv");
            });
        });

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
            <h2>Uncompleted Tasks</h2>
            <div class="form-div">
                <div id="tasks">
                    
                </div>
            </div>

            <h2 class="completedTasks">Completed Tasks</h2>
            <div class="completeTasks-div">
                <p>Task 1</p>
                <p>Task 2</p>
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