$(document).ready( function(){
    $.ajax({
        url: "includes/firstTasks.php",
        type: "POST",
        dataType: "json",

        success: function(tasks){
            console.log("AJAX success: ", tasks);
            tasks.forEach(function(task){
                let firstTasks = `
                    <div class='each-task deleteClass'>
                        <div class='end-to-end'>
                            <input data-id='${task.id}' class='checkbox' type='checkbox'>
                            <p class='taskContent'>
                                ${task.task}
                            </p>
                        </div>
                        <div class='end-to-end'>
                            <svg data-id='${task.id}' class='starIcon' xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='transparent' viewBox='0 0 24 24' stroke='hsl(272, 81%, 47%)'>
                                <path d='M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z'/>
                            </svg>
                            <button data-id='${task.id}' class='delete-btn' type='submit' name='delete'>
                                <svg class='trash-can-icon'  xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
                                    <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
                                    <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
                                </svg>
                            </button>

                        </div>
                    </div>
                `;
                $("#tasks").append(firstTasks);
            });

        },
        error: function(xhr, status, error){
            console.error("AJAX Error: ", status, error);
        }

    });
        
    $("#addForm").on("submit", function(e){
        e.preventDefault();
        let taskInput = $(this).find(".text-area").val();
        console.log("Task Input: ", taskInput);
        

        $.ajax({
            url: "includes/addTask.php",
            type: "POST",
            data: {newTask: taskInput},
            dataType: "json",
            success: function(tasks){
                console.log("AJAX Success: ", tasks);
                
            }, 
            error: function(xhr, status, error){
                console.error("AJAX Error: ", status, error);
            }


        });

        
    });

    
});