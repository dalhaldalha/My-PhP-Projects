$(document).on("change", ".checkbox", function() {
    let taskID = $(this).data("id");
    let newStatus = $(this).is(" :checked") ? 1 : 0;

    console.log("Clicked task:", taskID, "New Status:", newStatus);

    $.ajax({
        url: "includes/addStatus.php",
        type: "POST",
        data: {id: taskID, status: newStatus},
        
        success: function(response){
            console.log("Server says:", response);

            
            //Check if the task already exits, if it does not exist, fetchTasks(); else don't fetch
        }, 
        error: function(chr, status, error){
            console.error("AJAX Error: ", status, error);

        }
    });
    // $.post("includes/addStatus.php", {
    //     id: taskID,
    //     status: newStatus
    // }, function(response) {
    //     console.log("Server says:", response);

    //     fetchTasks();
    // });

});