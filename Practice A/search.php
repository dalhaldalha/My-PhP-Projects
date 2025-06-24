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
    
    <h2>Search Results</h2>
    <section >
        <?php 
            echo "<div>";
            if (empty($results)) {
                echo "<div>";
                echo "<p>There were no results!</p>";
                echo "</div>";
            } else {
                foreach ($results as $row) {
                    echo "<h3>" . htmlspecialchars($row["username"]) . "</h3>";
                    echo "<p>" . htmlspecialchars($row["comment_text"]) . "</p>";
                    echo "<p>" . htmlspecialchars($row["created_at"]) . "</p>";
                }
            }
            echo "</div>";
        
        ?>
    </section>    
</body>
</html>