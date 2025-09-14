<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once "config/database.php";
    $limit = 2;
    $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

    try {

        $query = "SELECT * FROM tasks ORDER BY created_at DESC LIMIT :limit OFFSET :offset;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindParam(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo json_encode($tasks);
        
        $pdo = null;
        $stmt = null;
        exit();

    } catch (PDOException $e){
        echo json_encode(["error" => $e->getMessage()]);
        exit();
    }


} else {
    header("Location: ../index.php");
    exit();
}
