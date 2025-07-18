<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usernameOrEmail = htmlspecialchars($_POST["usernameOrEmail"]);
    $pwd = htmlspecialchars($_POST["pwd"]);

    // Connect to the database
    require_once 'dbh.inc.php';

    // Check if the user exists
    $query = "SELECT * FROM users WHERE email = ? AND pwd = ?;";

    $stmt = $pdo->prepare($query); 

    $stmt->execute([$usernameOrEmail, $pwd]);
    $users = $stmt->fetchALL();

    if (empty($users)) {
        echo "We found No results";
    } elseif (isset($users)) {
        foreach ($users as $user) {
            echo "User email: ". $user['email'] . "<br>";
            echo "User Password: ". $user['pwd'] . "<br>";
        }
    }

} else {
    // Redirect to the login page if accessed directly
    header("Location: ../pages/login.pg.php");
    exit();
}