$(document).on("click", ".delete-btn", function(){
    let taskID = $(this).data("id");
    let button = $(this);

    console.log("Deleted task:", taskID);   
    
    $.ajax({
        url: "includes/deleteTask.php",
        type: "POST",
        data: { id: taskID},

        success: function(response) {
            console.log("Task deleted:", response);
            button.closest(".deleteClass").remove();

            let taskCount = $(".taskContent").length;
            console.log("Number of tasks: ", taskCount );
            if(taskCount === 0 ) {
                $(".each-task").html("<p>There are Many tasks</p>");
            }
        },
        error: function(xhr, status, error) {
            console.error("Deletion failed:", error);
        }

    });

    // $.post("includes/deleteTask.php", {
    //     id: taskID
    // }, function(){
    //     console.log("Server says: ", response);
    //     // Removes the task from the DOM
    //     button.closest(".deleteClass").remove();
    // });
    
});