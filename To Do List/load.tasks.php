<?php

require_once "config/database.php";
$taskNewCount = $_POST['taskNewCount'];

$query = "SELECT * FROM tasks ORDER BY created_at DESC LIMIT $taskNewCount;";
$stmt = $pdo->prepare($query);
$stmt->execute();

$tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);
$numRows = count($tasks);



if ($numRows > 0) {
            foreach ($tasks as $task) {
                // echo "<input class='checkbox' type='checkbox'>";
                echo "<p class='task-content'>";
                    echo $task["task"];
                echo "</p>";
            }
            // while ($row = mysqli_fetch_assoc($tasks)) {
                
            // }
        } else {
            echo "You have no tasks";
        }