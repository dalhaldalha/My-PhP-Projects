<?php

$dsn = "mysql:host=localhost;dbname=trivanadatabase"; //define variable for databasename.
$dbusername = "root"; //define variable for username of database.
$dbpassword = ""; //define variable for password of database.

// Try catch block performs the code in the try block if an error occurs, catches error and does something with the error message.
try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword); //PDO is a method to connect to a database with the 3 parameters; (it is actually enough to connect to a database) turns it to an object.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //This allows us to change some attributes of the $pdo object created above(basically saying that if we get an error, we want to throw an exception)
} catch (PDOException $e) { //Catches the exception and names it variable $e
    echo "Connection failed: " . $e->getMessage(); // Sends out a message saying "Connection failed" and giving us the error message through variable $e.
}