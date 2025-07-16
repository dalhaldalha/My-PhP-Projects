<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usernameOrEmail = htmlspecialchars($_POST["usernameOrEmail"]);
    $pwd = htmlspecialchars($_POST["pwd"]);

    // Connect to the database
    require_once 'dbh.inc.php';

    // Check if the user exists
    $query = "SELECT * FROM users WHERE (username = ? OR email = ?) AND pwd = ?";

    $stmt = $pdo->prepare($query); 

    $stmt->execute($usernameOrEmail, $pwd);
    $result = $stmt->get_result();

    echo "We found: " . $result;
} else {
    // Redirect to the login page if accessed directly
    header("Location: ../pages/login.pg.php");
    exit();
}