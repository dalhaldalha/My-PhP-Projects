<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>To Do List</h1>
    <form action="includes/formhandler.inc.php" method="post">
        <input type="text" name="task" placeholder="Write a new task" required>
        <button type="submit">Add Task</button>
    </form>

    <div>
        <p>task 1</p>
        <p>task 2</p>
        <p>task 3</p>
    </div>
</body>
</html>