<?php
// I want to add a way me to check if a checkbox is checked without having to sumbit it to the deleteTask file.
// This is so that i can manage the state of the checkbox and add it to my export for each task as Done or Incomplete.
// If the checkbox is checked, the status of the task should be Done.

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Requried Connections
    require_once "session.config.php";
    require_once "../config/database.php";


    
    
    // Database Query to fetch all tasks
    $query2 = "SELECT * FROM tasks ORDER BY created_at DESC;";
    $stmt = $pdo->prepare($query2);
    $stmt->execute();
    $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $totalTasks = count($tasks);
    
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

        //Adds the latest tasks in order.
        $taskContent = $tasks[$i]['task'];
        fwrite($taskfile, $taskContent);

        //Adds the status of each task and appends it to the task.
        $taskStatus = $tasks[$i]['status'];
        if ($taskStatus === 0) {
            $taskStatus = "Uncompleted";
        } elseif ($taskStatus === 1){
            $taskStatus = "Done";
        } else {
            $taskStatus = "Undefined";
        }
        $status = "     Status: " . $taskStatus . "\n\n";
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


