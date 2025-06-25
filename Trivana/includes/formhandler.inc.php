<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST["username"];
    $category = $_POST["category"];

    try {
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username) 
            VALUES (:username);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        switch ($category) {
            case "general":
                header("Location: ../categories/general.cat.php");
                break;
            case "science":
                header("Location: ../categories/science.cat.php");
                break;
            case "history":
                header("Location: ../categories/history.cat.php");
                break;
            case "maths":
                header("Location: ../categories/maths.cat.php");
                break;
            default:
                header("Location: ../index.php");
                break;
        }

        die();
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}