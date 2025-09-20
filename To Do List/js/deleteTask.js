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

            fetchTasks();

            let taskCount = $(".taskContent").length;
            console.log("Number of tasks remaining: ", taskCount );
            if(taskCount === 0 ) {
                let completedText = `
                    <div class="completed-div">
                        <img src="assets/checkMark.svg" alt="" class="completed-img">
                        <p>Your tasks are completed!!</p>
                    </div>

                    
                
                `;

                $("#tasks").append(completedText);

            }
        },
        error: function(xhr, status, error) {
            console.error("Deletion failed:", error);
        }

    });
    
});