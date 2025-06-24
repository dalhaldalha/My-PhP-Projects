<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usersearch = $_POST["usersearch"];


    try {
        require_once "includes/dbh.inc.php";

        $query = "SELECT * FROM comments WHERE username = :usersearch;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':usersearch', $usersearch);


        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null;
        $stmt = null;


    } catch (PDOException $e) {
        die("Query failed: " .$e->getMessage());

    }

} else {
    header("Location: ../index.php");
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3>Search Results</h3>

    <?php 
        if (empty($results)) {
            echo "<div>";
            echo "<p>There were no results!</p>";
            echo "</div>";
        } else {
            foreach ($results as $row) {
                echo htmlspecialchars($row["username"]); echo "<br>";
                echo htmlspecialchars($row["comment_text"]); echo "<br>";
                echo htmlspecialchars($row["created_at"]); echo "<br>";
            }
        }
    
    ?>
    
</body>
</html>