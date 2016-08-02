$(document).ready(function() {
    $(".list-group").on("click", ".list-group-item:not(.active)", "", function (event) {
        // Shows which list-group-item (issue) is currently active, and changes on click
        $(".active", event.delegateTarget).removeClass("active");
        $(this).addClass("active");
        
        var task_id = $(this).attr('value'); 
        var action = "info";
        $.post("controllers/tasks.php", {task_id:task_id, action:action}, function(result) {
            var values = result.split("|");
            console.log(values);
            
            $('#middle').load("views/middle/task_info.php", {task_id:values[0], name:values[1], description:values[2]});
        });
    });
    
    
    $('.page').on("click", function(event) {
        event.preventDefault();
        
        var task_id = $('.list-group-item.active').val();
        var value = $(this).val();
        var page = '';
        var action = 'info';
        switch (value)
        {
            case "Add Task":
                page = "add_task";
                action = 'add';
                break;
            case "Change Task Status":
                page = "change_status";
                break;
            case "Delete Task":
                page = "delete_task";
                break;
            case "Edit Task":
                page = "edit_task";
                break;
            case "Close Task":
                page = "close_task";
                break;
            default:
                page = "task_info";
                break;
        }
        if (task_id === undefined && action != 'add')
        {
            $('#middle').load("views/middle/no_task.php");
            return 1;
        }
        $.post("controllers/tasks.php", {task_id:task_id, action:action}, function(result) {
            var values = result.split("|");
            console.log(values);
            
            $('#middle').load("views/middle/"+page+".php", {task_id:values[0], name:values[1], description:values[2], status_id:values[3], status:values[4]});
        });
    })
    
    $('#delete-no').submit(function(event) {
        event.preventDefault();
        
        $('#middle').load("views/middle/task_info.php");
    });
})

