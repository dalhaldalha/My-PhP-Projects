<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "session.config.php";

    $_SESSION["checkbox"] = $_POST["checkbox"];

    $taskId = $_POST['task_id'] ?? NULL;

    require_once "../config/database.php";

    $query = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":id", $taskId);
    $stmt->execute();

    $pdo = null;
    $stmt = null;

    header("Location: ../index.php");
    exit();

} else {
    header("Location: ../index.php");
}