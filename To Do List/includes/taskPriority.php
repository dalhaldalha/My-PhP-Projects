<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "../config/database.php";


    $taskID = $_POST["id"];
    $taskPriority = $_POST["priority"];

    try {
        $query = "UPDATE tasks SET priority = ? WHERE id = ?";
        $stmt = pdo->prepare($query);
        $stmt->execute([$taskPriority, $taskID]);
        
    } catch (PDOException $e){
        echo json_encode(["error" => $e->getMessage()]);
    }
    

}


