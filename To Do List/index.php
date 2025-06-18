<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// To-Do List Algorithm

// 1. Database/Storage Setup
//    - Create an array or database to store tasks
//    - Each task should have: id, description, status (done/not done), created date

// 2. Task Display
//    - Show all tasks in a list format
//    - Display checkbox for task status
//    - Show delete button next to each task
//    - Sort tasks by creation date (newest first)
//    - Use different styles for completed vs uncompleted tasks

// 3. Add Task
//    - Show input field for new task description
//    - When form submitted:
//      a. Validate input (not empty)
//      b. Create new task with unique ID
//      c. Set initial status as 'not done'
//      d. Add to storage
//      e. Refresh task list

// 4. Update Task Status
//    - When checkbox clicked:
//      a. Get task ID from form
//      b. Toggle status (done/not done)
//      c. Update in storage
//      d. Refresh task list

// 5. Delete Task
//    - When delete button clicked:
//      a. Get task ID from form
//      b. Remove from storage
//      c. Refresh task list

// 6. Form Processing
//    - Check which form was submitted (add/update/delete)
//    - Process according to action
//    - Redirect back to main page after processing

// 7. Data Persistence
//    - Save tasks between sessions
//    - Handle reading/writing to storage
?>

    <h1>Your Tasks</h1>
</body>
</html>