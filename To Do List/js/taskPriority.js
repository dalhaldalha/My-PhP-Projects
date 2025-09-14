$(document).on("change", ".priority", function(){
    let val = $(this).val();
    let taskID = $(this).data('id'); 
    console.log("Value selected: ", val);
    console.log("Task ID: ", taskID);
    
    if (val === "high") {
        $(this).css("background-color", "#D22B2B").css("color", "white").css("border", "#D22B2B");
    } else if (val === "medium") {
        $(this).css("background-color", "orange").css("color", "white").css("border", "orange");
    } else if (val === "low") {
        $(this).css("background-color", "#B8B8FF").css("color", "white").css("border", "#B8B8FF");
    }
});