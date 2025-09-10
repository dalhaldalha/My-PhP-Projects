$(document).on("change", ".checkbox", function() {
    let taskID = $(this).data("id");
    let newStatus = $(this).is(" :checked") ? 1 : 0;

    $.post("../includes/exportTask.php", {
        id: taskID,
        status: newStatus
    }, function(response) {
        console.log(response);
    })

})