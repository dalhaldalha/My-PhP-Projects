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
        success : function (response){
            if(response.status === "success") {
                console.log(response.message);
            } else {
                console.log(response.message);
            }
        }, 
        error:function(xhr, status, error) {
            console.log("AJAX error: ", error);
        }
    });
});