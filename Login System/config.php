<?php

//makes your session handling more secure by ensuring session IDs are only sent via cookies.
ini_set('session.use_only_cookies', 1);
// Makes sure that the website only uses a session id that has been created by our server inside the website
//Also makes your session id more complex so that it doesn't get guessed easily.

//creates some parameters for your cookies
session_set_cookie_params([
    'lifetime' => 1800, //Destroys the cookies after 30mins.
    'domain' => 'localhost', //Ensures that the cookies only working in the following domain.
    'path' => '/', //Ensures that it only works in the designated paths inside the domain(If left empty, it will work in all paths inside the domain).
    'secure' => true, //The cookies will only work in a secure site(Only using an HTTPS connection not a HTTP connection).
    'httponly' => true //THis restricts any sort of script access from our clients inside the browser.
]);

session_start(); //This starts the session.

//Chects to see if session id is created, If not, it means that this is the first time the site is being accessed and runs the else statement.
if (!isset($_SESSION['last_regeneration'])) {
    
    //since the session id is set, it will regenerate it to make it stronger
    session_regenerate_id(true);
    //Creates the actual SESSION ID and gives it the value of the currect time. The time is important so that we can check if time has passed.
    $_SESSION['last_regeneration'] = time();

} else {

    //Creates a variable that we want to be the time that passes before we regenerate our SESSION id again
    $interval = 60 * 1;

    //Takes the currect time and substracts our SESSION time from it then checks to see if it is equal to or greater than our Interval variable.
    if (time() - $_SESSION['last_regeneration'] >= $interval) {

        // If it is greater than or equal to, it regenerates the SESSION ID and sets the new ID with the currecnt time.
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
}