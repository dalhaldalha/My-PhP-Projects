<?php

require_once "config/database.php";

$query = "SELECT * FROM tasks ORDER BY created_at DESC LIMIT 3;";
$stmt = $pdo->prepare($query);
$stmt->execute();

$tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);
$numRows = count($tasks);
