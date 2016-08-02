<?php
    include "../../controllers/statuses.php";
?>
<div class='alert alert-success text-center'><h4>Add Task</h4></div>
<form action='controllers/tasks.php' method='post'>
    <div class='form-group'>
        <label for='title'>Task:</label>
        <input type='text' name='title' id='title' class='form-control' placeholder="Title">
    </div>
    <div class='form-group'>
        <label for='content'>Description (optional):</label>
        <textarea placeholder='Description' name='content' id='content' class='form-control'></textarea>
    </div>
    <select class='form-control' name='status'>
        <?php foreach($status_list as $status): ?>
        <option value="<?=$status['id']?>"><?=$status['name']?></option>
        <?php endforeach; ?>
    </select><br>
    
    <input type='hidden' value='add' name='action'>
    <input type='submit' value="Submit" class='btn btn-primary btn-block'>

</form>