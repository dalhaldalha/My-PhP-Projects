$(document).on("click", ".starIcon", function(){
    $(this).toggleClass("starIconActive");
    let priority = $(this).hasClass("starIconActive") ? 1 : 0;
    let id = $(this).data("id");
    console.log("Task: ", id);
    console.log("Priority: ", priority);

    $.ajax ({
        url: "includes/taskPriority.php",
        type: "POST",
        data: {priority: priority, id:id},
        dataType: "json",
        success : function (){
            console.log("Priority Added to the database");
        }, 
        error:function(xhr, status, error) {
            console.log("Error message: ", status, error);
        }
    });
});