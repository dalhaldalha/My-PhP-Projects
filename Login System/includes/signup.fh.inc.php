<?php

//Checks to see if user accessed the page through a post method.
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //Takes all the inputed data, sanitizes it and declares it as a variable.
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $pwd = htmlspecialchars($_POST["pwd"]);

    try {

        //Establishes a data connection from the details in the file.
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username, email, firt_name, last_name, pwd) VALUES (?, ?, ?, ?, ?);";
        $stmt = $pdo->prepare($query);
        $stmt->excute([$username, $email, $firstName, $lastName, $pwd]);

        $pdo = null;
        $stmt = null;
    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());

    }

    // echo "Your password is: " . $pwd;
    

//If the page was accessed through other means, the user gets redirected back to the signup page.
} else {
    header("Location: ../pages/signup.pg.php");
}