$(document).ready(function(){
    console.log("DOM has been fully loaded");

    fetchTasks();

    $("#addForm").on("submit", function(e){
        e.preventDefault();
        let taskInput = $(this).find(".text-area").val();
        console.log("Task Input: ", taskInput);
        

        $.ajax({
            url: "includes/addTask.php",
            type: "POST",
            data: {newTask: taskInput},
            dataType: "json",
            success: function(response){
                console.log("AJAX Success: ", response.success);

                // fetchTasks();

                // Clears the input field after submission
                $("#addForm").trigger("reset");
                
            }, 
            error: function(xhr, status, error){
                console.error("AJAX Error: ", status, error);
            }


        });

        
    });
    
});