<?php

//Checks status of the checkbox and adds it to the database.

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once "../config/database.php";

    // var_dump($_POST);
    // exit;

    $taskId = $_POST["id"];
    $status = $_POST["status"];

    $query = "UPDATE tasks SET status = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    if($stmt->execute([$status, $taskId])) {    
        echo "Successfull Update";
    } else {
        echo "Unsuccessfull Update";
    }

}


