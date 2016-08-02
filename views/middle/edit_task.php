<?php
    include "../../controllers/statuses.php";
    
    $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));
    $task_name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $content = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
?>
<div class='alert alert-success text-center'><h4>Edit Task</h4></div>
<form action='controllers/tasks.php' method='post'>
    <div class='form-group'>
        <label for='title'>Task:</label>
        <input type='text' name='title' id='title' class='form-control' placeholder="Title" value="<?=$task_name?>">
    </div>
    <div class='form-group'>
        <label for='content'>Description (optional):</label>
        <textarea placeholder='Description' name='content' id='content' class='form-control'><?=$content?></textarea>
    </div>
    <input type='hidden' value='edit' name='action'>
    <input type='hidden' value='<?=$task_id?>' name='task_id'>
    <input type='submit' value="Submit" class='btn btn-primary btn-block'>

</form>