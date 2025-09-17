<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "../config/database.php";


    $taskID = $_POST["id"];
    $taskPriority = $_POST["priority"];

    
    $query = "UPDATE tasks SET priority = ? WHERE id = ?";
    $stmt = pdo->prepare($query);
    if ($stmt->execute([$taskPriority, $taskID])){
        $message1 = "Updated succesfully!";
        echo json_encode($message1);
    } else {
        $message2 = "Update failed!";
        echo json_encode($message2);
    }

    
}


