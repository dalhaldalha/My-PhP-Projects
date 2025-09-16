$(document).on("click", ".starIcon", function(){
    $(this).toggleClass("starIconActive");
    let priority = $(this).hasClass("starIconActive") ? 1 : 0;
    let id = $(this).data("id");
    console.log("Task: ", id);
    console.log("Priority: ", priority);
});