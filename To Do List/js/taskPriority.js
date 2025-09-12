$(document).on("change", ".priority", function(){
    let val = $(this).val();
    let taskID = $(this).data('id'); 
    console.log("Value selected: ", val);
    console.log("Task ID: ", taskID);
    
    if (val === "high") {
        $(this).css("background-color", "#ff6b6b").css("color", "white").css("border", "#ff6b6b");
    } else if (val === "medium") {
        $(this).css("background-color", "yellow").css("color", "white");
    } else if (val === "low") {
        $(this).css("background-color", "blue").css("color", "white");
    }
});