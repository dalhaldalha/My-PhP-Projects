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
                    let taskHtml = `
                        <div class='each-task deleteClass'>
                            <div class='end-to-end'>
                                <input data-id='" . $task["id"] . "' class='checkbox' type='checkbox'>
                                <p class='taskContent'>
                                    ${task.task}
                                </p>
                            </div>
                            <div class='end-to-end'>
                                <select data-id='" . $task["id"] . "' id='priority' class='priority'>
                                    <option value='' disabled selected>Select Priority</option>
                                    <option  value='high' class='priority-high'>High</option>
                                    <option  value='medium' class='priority-medium'>Medium</option>
                                    <option  value='low' class='priority-low'>Low</option>
                                </select>
                                <button data-id='" . $task["id"] . "' class='delete-btn' type='submit' name='delete'>
                                    <svg class='trash-can-icon'  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                    </svg>
                                </button>

                            </div>
                        </div>
                    `;

                    $("#tasks").append(taskHtml);

                });
            },
                error: function(xhr, status, error) {
                    console.error("AJAX Error: ", status, error);
                } 

        });
    });
});