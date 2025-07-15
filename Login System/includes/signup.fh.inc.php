<?php

//Checks to see if user accessed the page through a post method.
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    require_once "dbh.inc.php";

    echo "Your password is: " . $pwd;
    

//If the page was accessed through other means, the user gets redirected back to the signup page.
} else {
    header("Location: ../pages/signup.pg.php");
}