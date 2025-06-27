<?php
session_start(); //starts session on this page

if ($_SERVER['REQUEST_METHOD'] == "POST") { // Will only run this code if user accessed this page through a "post" method.
    $username = $_SESSION["username"] = $_POST["username"]; //takes the "username" from the form and session and stores it as a variable.
    $category = $_SESSION["category"] = $_POST["category"]; //takes the "category" from the form and session and stores it as a variable.

    try {
        require_once "dbh.inc.php"; //links the codes from another file. In this context, it links to our database connection file.

        $query = "INSERT INTO users (username) 
            VALUES (:username);"; //Does a SQL query to insert into the users table, the value of "username"

        $stmt = $pdo->prepare($query); //This line is responsible for sumbiting the query into the database.

        $stmt->bindParam(":username", $username); //This line binds the data being sumbitted into the database.
        $stmt->execute(); // This is the final line that excutes the query.

        $pdo = null; //This two statements cancel out the connection to the database. They are not nessecery because it is done automatically but it is best practive to free up resources as early as possible.
        $stmt = null;

        // The following switch statements checks what the user set category as. Depending on the category value, the user will be redirected to its respective page.
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

        die(); //Used for closing off a script that has a connection. Use "exit()" if the script has no connection.
    } catch (PDOException $e) { //Catches the exception and names it variable $e
        die("Connection failed: " . $e->getMessage()); //Sends a message if connection to the database is unsuccessful and gives a message as to the reason.
    }

} else { //If user does not access this page through the "post" method, they will be redirected to the home page.
    header("Location: ../index.php"); 
}