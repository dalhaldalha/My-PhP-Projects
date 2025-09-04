<?php

$taskfile = fopen("mytasks.txt", "w");
$dummytext = "This is a dummy text to test file writing.";
fwrite($taskfile, $dummytext);
fclose($taskfile);

echo $taskfile;