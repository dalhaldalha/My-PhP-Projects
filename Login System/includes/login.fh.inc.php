<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $usernameOrEmail = htmlspecialchars($_POST["usernameOrEmail"]);
    $loginPwd = htmlspecialchars($_POST["pwd"]);


    // Connect to the database
    require_once 'dbh.inc.php';

    // Check if the user exists
    $query = "SELECT * FROM users WHERE email = ?;";

    $stmt = $pdo->prepare($query); 

    $stmt->execute([$usernameOrEmail]);
    $users = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $hashedPwd = $users[0]['pwd'];

    if (isset($users) && password_verify($loginPwd, $hashedPwd) ) {
        echo "Welcome User.";
    } else {
        echo "You are not a user.";
    }

    // echo $users[0]['pwd'];

    // die();

    // if (password_verify($pwd, $users[0]['pwd'])) {
    //     echo "The password is a match";
    // } else {
    //     echo "The password is not a match";
    // }

    // die();


    // echo "Here is the password: " . $users[0]['pwd'];


    if (empty($users)) {
        echo "We found No results";
    } elseif (isset($users)) {
        foreach ($users as $user) {
            // $loginPwd = $user['pwd'];


            // $verfy = password_verify($loginPwd, $pwd);

            // echo "It is: " . $verfy;
            // echo "User email: ". $user['email'] . "<br>";
            // echo "User Password: ". $user['pwd'] . "<br>";
        }
    }

} else {
    // Redirect to the login page if accessed directly
    header("Location: ../pages/login.pg.php");
    exit();
}