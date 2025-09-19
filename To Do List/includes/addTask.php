<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTask = $_POST['newTask'];

    
    require_once "../config/database.php";
    
    try {
        $query = "INSERT INTO tasks (task) VALUES (:task)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':task', $newTask);
        $stmt->execute();
        $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo json_encode($tasks);
        header("Location: ../index.php");

        exit();

    } catch(PDOException $e) {
        echo json_encode(["error" => $e->getMessage]);
    }

    

} else {
    header("Locatin: ../index.php");
}