<?php

require_once "../config/database.php";

$query = "SELECT * FROM tasks ORDER BY created_at DESC;";
$stmt = $pdo->prepare($query);
$stmt->execute();
$tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);

