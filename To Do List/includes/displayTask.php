<?php

require_once "config/database.php";

$query = "SELECT * FROM tasks ORDER BY created_at DESC LIMIT 4;";
$stmt = $pdo->prepare($query);
$stmt->execute();
$tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);

if (mysqli_num_rows($tasks) > 0) {
    // while () {

    // }
} else {
    echo "You have no tasks";
}

