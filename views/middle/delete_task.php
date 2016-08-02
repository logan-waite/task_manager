<?php
    $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));
    $task_name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
?>
<div class="alert alert-danger" role="alert">Are you sure you want to delete "<?=$task_name?>"? This action cannot be undone!</div>
    <form action='controllers/tasks.php' method='post'>
        <input type='hidden' value='<?=$task_id?>' name='task_id' id='task_id'>
        <input type='hidden' value='delete' name='action'>
        <input class='btn btn-default btn-block' type='submit' value='Yes' name='delete'>
    </form>
    <form id='delete-no'>
        <input class='btn btn-info btn-block' type='submit' value='No'>
    </form>
