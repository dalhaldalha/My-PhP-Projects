<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars($_POST["email"]);
    $loginPwd = htmlspecialchars($_POST["pwd"]);


    // Connect to the database
    require_once 'dbh.inc.php';

    // Check if the user exists
    $query = "SELECT * FROM users WHERE email = ?;";

    $stmt = $pdo->prepare($query); 

    $stmt->execute([$email]);
    $users = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $hashedPwd = $users[0]['pwd'];

    if (isset($users) && password_verify($loginPwd, $hashedPwd) ) {
        echo "Welcome User.";
    } else {
        echo "You are not a user.";
        header("Location: ../pages/login.pg.php");
    }



} else {
    // Redirect to the login page if accessed directly
    header("Location: ../pages/login.pg.php");
    exit();
}