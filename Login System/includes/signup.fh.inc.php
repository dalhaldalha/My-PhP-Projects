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

        //Does a query to insert the data into their respective places in the database.
        $query = "INSERT INTO users (username, email, first_name, last_name, pwd) VALUES (?, ?, ?, ?, ?);";
        //Prepares the query to be executed.
        $stmt = $pdo->prepare($query);
        //Adds the inputed data to the query and executes it.
        $stmt->execute([$username, $email, $firstName, $lastName, $pwd]);

        //Closes the connection to the database.
        //This is done to prevent memory leaks.
        $pdo = null;
        $stmt = null;

        //Redirects the user to the login page after successful signup.
        header("Location: ../pages/login.pg.php");
        // Stops the script here to prevent further execution.
        die();
    //Catches any errors that may occur during the process and displays them.
    } catch (PDOException $e) {
        //If an error occurs, this message will be displayed.
        die("Query failed: " .$e->getMessage());

    }

    // echo "Your password is: " . $pwd;
    

//If the page was accessed through other means, the user gets redirected back to the signup page.
} else {
    header("Location: ../pages/signup.pg.php");
}