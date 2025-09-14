$(document).ready(function(){

    // function loadTasks() {

    // }
    $("#loadBtn").on("click", function(){
        let offset = $(".taskContent").length;
        console.log("Offset: ", offset);

        $.ajax({
            url: "load.tasks.php",
            type: "POST",
            data: {offset: offset},
            dataType: "json",
            success : function(tasks){
                console.log("Tasks: ", tasks);
                tasks.forEach(function(task) {
                    let taskElement = `
                        <div class="taskContent">
                            <p>${task.task}</p>
                        </div>
                    `;

                    $(".each-task").append(taskHtml);

                });
            },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                } 

        });
    });
});