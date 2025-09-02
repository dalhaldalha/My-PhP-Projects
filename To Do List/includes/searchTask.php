<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $searchTerm = $_POST['search'] ?? NULL;

    require_once "../config/database.php";

    $query = "SELECT * FROM tasks WHERE task = :searchterm;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':searchterm', $searchTerm);
    $stmt->execute();

    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $pdo = null;
    $stmt = null;

    exit();

} else {
    header("Location: ../index.php");
}