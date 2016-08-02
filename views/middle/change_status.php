<?php
    include "../../controllers/statuses.php";

    $task_id = trim(filter_input(INPUT_POST, 'task_id', FILTER_SANITIZE_NUMBER_INT));
    $task_name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $status_id = trim(filter_input(INPUT_POST, 'status_id', FILTER_SANITIZE_NUMBER_INT));
?>

<div class='alert alert-success text-center'><h4>Change Status for "<?=$task_name?>"</h4></div>
<form action='controllers/tasks.php' method='post'>
    <input type='hidden' value='change_status' name='action'>
    <input type='hidden' value='<?=$task_id?>' name='task_id'>
    <select class='form-control' name='status_id'>
        <?php foreach($status_list as $status): ?>
            <?php if($status['id'] == $status_id): ?>
            <option value='<?=$status['id']?>' selected><?=$status['name']?></option>
            <?php else: ?>
            <option value='<?=$status['id']?>'><?=$status['name']?></option>
            <?php endif; ?>
        <?php endforeach; ?>
    </select><br>
    <input type='submit' class='btn btn-primary btn-block'>
</form>
