<?php
    $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));
    $task_name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
?>
<div class="alert alert-success text-center" role="alert"><h4>Hurray! You've finished "<?=$task_name?>"!</h4></div>
<form action='controllers/tasks.php' method='post'>
    <input type='hidden' value='<?=$task_id?>' name='task_id' id='task_id'>
    <input type='hidden' value='close' name='action'>
    <div class='form-group'>
        <label for='comment'>Final comments on task (optional):</label>
        <textarea placeholder='Comment' name='comment' id='content' class='form-control'></textarea>
    </div>
    <input class='btn btn-primary btn-block' type='submit' value='Close' name='close'>
</form>
