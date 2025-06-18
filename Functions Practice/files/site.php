<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName = htmlspecialchars($_POST["userName"]);
    $password = htmlspecialchars($_POST["password"]);

    header("Location: ../index.php");

    echo "Your username is $userName";
    echo "<br>";
    echo "Your password is $password";

} else {
    header("Location: ../index.php");
}