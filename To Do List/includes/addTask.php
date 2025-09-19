<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTask = $_POST['newTask'];

    
    require_once "../config/database.php";
    
    try {
        $query1 = "INSERT INTO tasks (task) VALUES (:task)";
        $stmt = $pdo->prepare($query1);
        $stmt->bindParam(':task', $newTask);
        $stmt->execute();

        $query2 = "SELECT * FROM tasks ORDER BY created_at DESC LIMIT 2;";
        $stmt = $pdo->prepare($query2);
        $stmt->execute();


        $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);
        // $numRows = count($tasks);
        
        echo json_encode($tasks);

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