<?php
session_start(); //starts session on this page

if ($_SERVER['REQUEST_METHOD'] == "POST") { // Will only run this code if user accessed this page through a "post" method.
    $username = $_SESSION["username"] = $_POST["username"]; //takes the "username" from the form and session and stores it as a variable.
    $category = $_SESSION["category"] = $_POST["category"]; //takes the "category" from the form and session and stores it as a variable.

    try {
        require_once "dbh.inc.php"; //links the codes from another file. In this context, it links to our database connection file.

        $query = "INSERT INTO users (username) 
            VALUES (:username);";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $pdo = null;
        $stmt = null;

        switch ($category) {
            case "general knowledge":
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