<?php

    require_once "session.config.php";

    $taskId = $_POST['id'] ?? NULL;

    require_once "../config/database.php";

    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $taskId);
    // Executes the query and returns true or false. 
    if($stmt->execute()) {
        echo "Successfully";
    } else {
        echo "Unsuccessfully";
    }

    $pdo = null;
    $stmt = null;
    exit();

