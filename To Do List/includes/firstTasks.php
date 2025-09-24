<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "../config/database.php";

    try {
        $query2 = "SELECT * FROM tasks ORDER BY created_at DESC LIMIT 2;";
        $stmt = $pdo->prepare($query2);
        $stmt->execute();
        $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo json_encode($tasks);
        $taskCount = count($tasks);
        // echo json_encode($taskCount);

        $pdo = null;
        $stmt = null;

        exit();

    } catch (PDOException $e) {
        echo json_encode(["error" => $e->getMessage()]);
        exit();
    }

} else {
    echo json_encode(["error" => "Wrong Request Method"]);
    exit();
}