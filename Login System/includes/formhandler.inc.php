<?php

//Checks to see of the access method of the site is through the post method
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $enterMethod;
    $login = $_POST["login"];
    $signUp = $_POST["signUp"];

    if ($enterMethod == $login) {
        header("Location: ../pages/login.pg.php");
    } elseif($enterMethod == $signUp) {
        header("Location: ../pages/signup.pg.php");
    } else {
        header("Location: ../index.php");
    }

} else {
    // If the server was not accessed through the form, user gets redirected to homepage.
    header("Location: ../index.php");
}