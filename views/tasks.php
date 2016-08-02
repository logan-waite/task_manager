<?php
    include "controllers/tasks.php";  
//debug($task_list);
?>
<ul class='list-group' id='task-list'>
    <?php foreach($task_list as $item): ?>
    <li class='list-group-item' value='<?=$item['id']?>'><?=$item['title']?><span class='badge'><?=$item['name']?></span></li>
    <?php endforeach; ?>
</ul>
