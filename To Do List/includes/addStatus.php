<?php

//Checks status of the checkbox and adds it to the database.


require_once "../config/database.php";

// var_dump($_POST);
// exit;

$taskId = $_POST["id"];
$status = $_POST["status"];

$query1 = "UPDATE tasks SET status = ? WHERE id = ?";
$stmt = $pdo->prepare($query1);
$stmt->execute([$status, $taskId]);

