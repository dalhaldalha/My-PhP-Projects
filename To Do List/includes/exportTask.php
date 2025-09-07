<?php
// I want to add a way me to check if a checkbox is checked without having to sumbit it to the deleteTask file.
// This is so that i can manage the state of the checkbox and add it to my export for each task as Done or Incomplete.
// If the checkbox is checked, the status of the task should be Done.

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once "session.config.php";

    // Database Query to fetch all tasks
    require_once "../config/database.php";
    $query = "SELECT * FROM tasks ORDER BY created_at DESC;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $totalTasks = count($tasks);
    // foreach ($tasks as $task) {
    //     $tasktxt = $task['task'];
    //     $taskfile = fopen("mytasks.txt", "w");
    // }
    // Create a file and write dummy text to it
    // $taskfile = fopen("mytasks.txt", "w");
    // $dummytext = "This is a dummy text to test file writing.";
    // fwrite($taskfile, $dummytext);
    // fwrite($taskfile, "\n Total Tasks: " . $totalTasks . "\n");
    // fclose($taskfile);
    

    // Check if checkbox is checked
    // if the checkbox is checked, the statues of the task Should be done
    // if the checkbox is not checked, the status of the task should be not done
    // 1 = done, 0 = not done

    
    if (!isset($_SESSION["checkbox"])) {
        $checkboxValue = "Not Done"; 
    } else {
        $checkboxValue = "Done"; 
    } 
    
    // Adds a header to the file before we add the tasks.
    $headertxt = "My Tasks:\n\n";
    $taskfile = fopen("mytasks.txt", "w");
    fwrite($taskfile, $headertxt);
    fclose($taskfile);

    $i = 0;
    while ($i < $totalTasks) {

        $taskfile = fopen("mytasks.txt", "a");
        $points = " - ";
        fwrite($taskfile, $points);
        $taskContent = $tasks[$i]['task'];
        fwrite($taskfile, $taskContent);
        $status = "     Status: " . $checkboxValue . "\n";
        fwrite($taskfile, $status); 
        fclose($taskfile);
        $i++;
    }

    // Set up headers to prompt file download
    if (file_exists("mytasks.txt")) {
        header("Content-Type: text/plain");
        header("Content-Disposition: attachment; filename=mytasks.txt");
        readfile("mytasks.txt");
        exit();
    } else {
        echo "File does not exist.";
        exit();
    }
    
} else {
    header("Location: ../index.php");
    exit();
}


