<?php
    include "resources/header.php";
?>
<div class='container-fluid' id='main-wrapper'>
    <div class='page-header text-center'>
        <h1>Task Manager</h1>
    </div>
    <div class='col-md-3 col-sm-4' id='left'>
        <?php include "tasks.php"; ?>
    </div>
    <div class='col-md-6 col-sm-4' id='middle'>
        <?php include "views/middle/no_task.php"; ?>
    </div>
    <div class='col-md-3 col-sm-4' id='right'>
        <?php include "buttons.php"; ?>
    </div>
    <div class='col-xs-12'>
        <?php include "footer.php"; ?>
    </div>
</div>
