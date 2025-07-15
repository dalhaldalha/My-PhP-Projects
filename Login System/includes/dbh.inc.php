<?php
//dsn= data source name.
//Creates a variable and points it to where the database is.
$dsn = "mysql:host=localhost;dbname=loginsystem";
//Assigns the database username to a variable.
$dbusername = "root";
//Assigns the database password to a variable.
$dbpassword = "";

try {
    //pdo is a method of connecting to a database. We create a PDO object from an existing class in  that connects based on the parameters that we give it. In this case, it would be the dsn, dbusername, and dbpassword. 
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    //This allows use to change some attributes of the object that we created. In this case, we are saying that if we get an error, we want to throw an exception.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //We catch the exception and name it $e.
} catch(PDOException $e) {
    //If an error does occur, this is the message that will be echoed.
    echo "Connection failed: " .$e->getMessage();

}