<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "../config/database.php";

    $taskID = $_POST["id"];
    $taskPriority = $_POST["priority"];

    $query = "UPDATE tasks SET priority = ? WHERE id = ?";
    $stmt = pdo->prepare($query);
    if($stmt->execute([$taskPriority, $taskID])){
        echo "Priority Succesfully updated";
    } else {
        echo "Priority Update Failed";
    }
}


