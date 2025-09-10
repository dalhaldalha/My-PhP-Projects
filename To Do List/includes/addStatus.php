<?php

//Checks status of the checkbox and adds it to the database.


require_once "../config/database.php";


$tasId = $_POST["id"];
$status = $_POST["status"];

$query1 = "UPDATE tasks SET status = ? WHERE id = ?";
$stmt = $pdo->prepare($query1);
$stmt->execute([$status, $taskID]);

