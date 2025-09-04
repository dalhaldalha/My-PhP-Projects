<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskfile = fopen("mytasks.txt", "w");
    $dummytext = "This is a dummy text to test file writing.";
    fwrite($taskfile, $dummytext);
    fclose($taskfile);
} else {
    header("Location: ../index.php");
    exit();
}


