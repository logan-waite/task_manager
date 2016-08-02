<?php

    if ($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        $include = "../";
    }
    else
    {
        $include = "";   
    }
        include ($include . "models/task.php");

    $task_list = get_tasks();

    if(isset($_POST['action']) && !empty($_POST['action']))
    {
        if ($_POST['action'] == 'info')
        {
            $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));
           
            $task_info = get_active_task($task_id);
            $task_string = implode("|", $task_info);
            
            echo $task_string;
        }
        else if ($_POST['action'] == 'add')
        {
            $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
            
            if(empty($_POST['title']))
            {
                header("Location: ../index.php");
            }
            
            $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING));
            $status_id = trim(filter_input(INPUT_POST, 'status', FILTER_SANITIZE_NUMBER_INT));
            
            add_task($title, $content, $status_id);
            
            header("Location: ../index.php");
        }
        
        else if ($_POST['action'] == 'delete')
        {
            $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));

            delete_task($task_id);
            
            header("Location: ../index.php");
        }
        else if ($_POST['action'] == 'change_status')
        {
            $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));
            $status_id = trim(filter_input(INPUT_POST, 'status_id', FILTER_SANITIZE_NUMBER_INT));
            
            $success = update_task_status($task_id, $status_id);
            
            header("Location: ../index.php"); 
        }
        else if ($_POST['action'] == 'close')
        {
            $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));
            $comment = trim(filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING));
            
            $success = close_task($task_id, $comment);
            
            header("Location: ../index.php");
        }
        else if ($_POST['action'] == 'edit')
        {
            $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));
            $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));
            $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING));
            
            if (empty($title))
            {
                header("Location: ../index.php");
            }
            else
            {
                $success = edit_task($task_id, $title, $content);
            
                header("Location: ../index.php");
            }
            
        }
    }
?>