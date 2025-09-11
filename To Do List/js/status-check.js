$(document).on("change", ".checkbox", function() {
    let taskID = $(this).data("id");
    let newStatus = $(this).is(" :checked") ? 1 : 0;

    console.log("Clicked task:", taskID, "New Status:", newStatus);
    $.post("includes/addStatus.php", {
        id: taskID,
        status: newStatus
    }, function(response) {
        console.log("Server says:", response);
    });

});