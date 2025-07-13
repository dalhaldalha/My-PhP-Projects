<?php

//Checks to see of the access method of the site is through the post method
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    //Checks if the login button was pressed
    if (isset($_POST['login'])) {
        // Redirects to the login page
        header("Location: ../pages/login.pg.php");
        exit(); // Stops script here
    //Checks if the sign up button was pressed
    } elseif(isset($_POST['signUp'])) {
        // Redirects to the sign up page
        header("Location: ../pages/signup.pg.php");
        exit(); // Stops script here
    // If neither button was pressed, redirect to the homepage
    } else {
        // Redirects to the homepage
        header("Location: ../index.php");
        exit(); // Stops script here
    }

} else {
    // If the server was not accessed through the form, user gets redirected to homepage.
    header("Location: ../index.php");
    exit();
}