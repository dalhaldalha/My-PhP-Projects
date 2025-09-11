<?php

    //Today's Tasks:
        /*Strike through text when checkbox is clicked*/
        //Checked Box needs to be stored and then manipulated in export.
            //Check each status of each checkbox and add the state to the database.
            //Select all the states and export them along with their respective task to a txt documnet.
        //Delete Task Actually deletes task.
        //Tasks and their status should stay the same even after loading more tasks
        //Option to change to load less.
        
    require_once "includes/displayTask.php";
    require_once "includes/session.config.php";
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

    <script>

        // Script to load more tasks by 2
        $(document).ready(function(){
            var taskCount = 2;
            $("#btn").click(function(){
                taskCount = taskCount + 2;
                $("#tasks").load("load.tasks.php", {
                    taskNewCount: taskCount
                });
            });
        });

        $(document).ready(function(){
            $("#deleteBtn").click(function(){
                $.post("includes/deleteTask.php");
            });
        });
        
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
                            // echo "<pre>";
                            // print_r($tasks);
                            // echo "</pre>";
                            echo "<div class='each-task'>";
                                echo "<div class='end-to-end'>";
                                    echo "<input data-id='" . $task["id"] . "' class='checkbox' type='checkbox'>";
                                    echo "<p class='taskContent'>";
                                        echo $task["task"];
                                    echo "</p>";
                                echo "</div>";
                                echo "<div class='end-to-end'>";
                                    echo "<select class='status'>";
                                        echo "<option class='status-incomplete'>Incomplete</option>";
                                        echo "<option class='status-done'>Done</option>";
                                    echo "</select>";
                                    $taskID = $task['id'];
                                    echo "<button id='deleteBtn' class='delete-btn' type='submit' name='delete'>";
                                        echo "<svg class='trash-can-icon'  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>";
                                            echo "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>";
                                            echo "<path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>";
                                        echo "</svg>";
                                    echo "</button>";

                                echo "</div>";
                            echo "</div>";
                            
                            
                        }
                        // while ($row = mysqli_fetch_assoc($tasks)) {
                            
                        // }
                    } else {
                        echo "You have no tasks";
                    }
                    ?>
                </div>
                <!-- <?php foreach ($tasks as $task): ?>
                    
                    <form class="each-task" action="includes/deleteTask.php" method="post">
                        <div class="end-to-end">
                            <input class="checkbox" type="checkbox" name="checkbox">
                            <label class="task-content"><?php echo htmlspecialchars($task['task']); ?></label>
                        </div>
                        <div class="end-to-end">
                            <select class="status" name="status">
                                <option class="status-incomplete" value="I">Incomplete</option>
                                <option class="status-done" value="D">Done</option>
                            </select>
                            
                            <input type="hidden" name="task_id" value="<?php echo $task['id']; ?>">
                            <button class="delete-btn" type="submit" name="delete">  
                                <svg class="trash-can-icon"  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                <?php endforeach; ?> -->
            </div>
        </div>

        <div class="task-footer">
            <form action="includes/exportTask.php" method="post">
                <button class="export-btn" type="submit">Export All Tasks</button>
            </form>
            
            <button id="btn">Load more tasks...</button>
            
            <!-- <a id="btn" class="load-more" href="">Load more tasks...</a> -->

        </div>
        
    </div>
</body>
</html>