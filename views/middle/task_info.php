<?php
    $title = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $content = trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING));
?>
<div class='text-center'>
    <h2><?=$title?></h2>
</div>
<div>
    <p><?=$content?></p>
</div>
