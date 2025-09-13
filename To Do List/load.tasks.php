<?php


require_once "config/database.php";
$limit = 2;
$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;

try {

    $query = "SELECT * FROM tasks LIMIT :limit OFFSET :offset;";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$limit, $offset]);
    $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);
    echo json_encode($tasks);

} catch (PDOException $e){
    echo json_encode(["error" => $e->getMessage()]);

}

// $taskNewCount = $_POST['taskNewCount'];

// $query = "SELECT * FROM tasks ORDER BY created_at DESC LIMIT $taskNewCount;";
// $stmt = $pdo->prepare($query);
// $stmt->execute();

// $tasks = $stmt->fetchALL(PDO::FETCH_ASSOC);
// $numRows = count($tasks);



// if ($numRows > 0) {

//     foreach ($tasks as $task) {
//         echo "<div class='each-task deleteClass'>";
//             echo "<div class='end-to-end'>";
//                 echo "<input data-id='" . $task["id"] . "' class='checkbox' type='checkbox'>";
//                 echo "<p class='taskContent'>";
//                     echo $task["task"];
//                 echo "</p>";
//             echo "</div>";
//             echo "<div class='end-to-end'>";
//                 echo "<select class='priority'>";
//                     echo "<option class='priority'>High</option>";
//                     echo "<option class='priority'>Medium</option>";
//                     echo "<option class='priority'>Low</option>";
//                 echo "</select>";
//                 echo "<button data-id='" . $task["id"] . "' class='delete-btn' type='submit' name='delete'>";
//                     echo "<svg class='trash-can-icon'  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>";
//                         echo "<path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>";
//                         echo "<path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>";
//                     echo "</svg>";
//                 echo "</button>";

//             echo "</div>";
//         echo "</div>";
        
        
//     }
// } else {
//     // echo "You have no tasks";
// }