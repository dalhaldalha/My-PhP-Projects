<?php
// Add a Header called "My Tasks to the txt file
// Add bullet points to each task in the txt file

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
    
    $i = 0;
    while ($i < $totalTasks) {
        $taskContent = $tasks[$i]['task'];
        $taskfile = fopen("mytasks.txt", "a");
        fwrite($taskfile, $taskContent . "\n");
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


