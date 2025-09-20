<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTask = $_POST['newTask'];

    
    require_once "../config/database.php";
    
    try {
        $query1 = "INSERT INTO tasks (task) VALUES (:task)";
        $stmt = $pdo->prepare($query1);
        $stmt->bindParam(':task', $newTask);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        exit();

    } catch(PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
    }

} else {
    echo json_encode(["error" => "Invalid request method."]);
    exit();
}