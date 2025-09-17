<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newTask = $_POST['newTask'] ?? NULL;


    require_once "../config/database.php";

    function addTask($newTask) {
        global $pdo;
        $query = "INSERT INTO tasks (task) VALUES (:task)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':task', $newTask);
        $stmt->execute();
        header("Location: ../index.php");
        exit();
    }

    if ($newTask) {
        addTask($newTask);
    } else {
        echo "Task cannot be empty.";
    }
    

} else {
    header("Locatin: ../index.php");
}