<?php
    include "../../resources/db_connect.php";

function add_status()
{
    
}

function edit_status()
{

}

function get_statuses()
{
    global $db;
    
    $query = "SELECT id, name
            FROM statuses";
    
    $result = $db->prepare($query);
    $result->execute();
    
    return $result->fetchAll();
}

function get_task_status($task_id)
{
    global $db;

    $query = "SELECT statuses.name
                FROM statuses
                JOIN tasks
                    ON tasks.status_id = statuses.id
                WHERE tasks.id = :task_id";
    $result = $db->prepare($query);
    $result->execute(
        array(
            "task_id" => $task_id
        )
    );
    
    return $result->fetch();
}
function delete_status()
{
    
}