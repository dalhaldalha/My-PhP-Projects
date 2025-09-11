$(document).on("click", ".delete-btn", function(){
    let taskID = $(this).data("id");
    console.log("Deleted task:", taskID);        

    $.post("includes/deleteTask.php", {
        id: taskID
    }, function(){
        console.log("Server says: ", response);
    });
    
});