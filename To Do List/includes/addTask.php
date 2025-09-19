<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTask = $_POST['newTask'];



    function addTask($newTask) {
        require_once "../config/database.php";
        global $pdo;
        try {
            $query = "INSERT INTO tasks (task) VALUES (:task)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':task', $newTask);
            $stmt->execute();
            $tasks = fetchALL(PDO::FETCH_ASSOC);
            echo json_encode($tasks);

        } catch(PDOException $e) {

        }
        
        
        header("Location: ../index.php");
        exit();
    }

    if (!isset($newTask)) {
        addTask($newTask);
    } else {
        echo "Task cannot be empty.";
    }
    

} else {
    header("Locatin: ../index.php");
}