<?php
    include $include . "resources/db_connect.php";

    function add_task($title = NULL, $content = NULL, $status_id = 1)
    {
        if($title == NULL)
        {
            throw new Exception ("No title passed into add_task!");
        }
        
        global $db;
        
        $query = "INSERT INTO tasks
                (title, description, status_id)
                VALUES
                (:title, :description, :status_id)";
        
        $result = $db->prepare($query);
        $result->execute(
            array(
                "title" => $title, 
                "description" => $content, 
                "status_id" => $status_id
            )
        );
    }

    function close_task($task_id = NULL, $comment = NULL)
    {
        error_log($comment);
        if ($task_id == NULL)
        {
            throw new Exception("Missing task_id in close_task!");
        }
        global $db;
        
        $query = "UPDATE tasks
                SET status_id = 0
                WHERE tasks.id = :task_id";
        $result = $db->prepare($query);
        $success['change_status'] = $result->execute(
            array(
                "task_id" => $task_id
            )
        );
        
        if ($comment != NULL)
        {
            $query = "INSERT INTO comments
                        (content, task_id)
                        VALUES
                        (:content, :task_id)";
            $result = $db->prepare($query);
            $success['insert_comment'] = $result->execute(
                array(
                    "content" => $comment, 
                    "task_id" => $task_id
                )
            );            
        }
 
        return $success;
    }

    function delete_task($task_id = NULL)
    {
        global $db;

        $query = "DELETE FROM tasks
                WHERE id = :task_id";
        $result = $db->prepare($query);
        $result->execute(
            array(
                "task_id" => $task_id
            )
        );
    }

    function edit_task($task_id = NULL, $title = NULL, $content = NULL)
    {
        if ($task_id == NULL || $title == NULL)
        {
            throw new Exception ("Not enough information passed to edit_task");
        }
        
        global $db;
        
        $query = "UPDATE tasks
                    SET title = :title,
                        description = :content
                    WHERE id = :task_id";
        $result = $db->prepare($query);
        $success = $result->execute(
            array(
                "title" => $title, 
                "content" => $content, 
                "task_id" => $task_id
            )
        );
        return $success;
    }

    function get_tasks()
    {
        global $db;
        
        $query = "SELECT tasks.id AS id,
                        tasks.title,
                        tasks.description,
                        statuses.name
                FROM tasks
                JOIN statuses
                    ON statuses.id = tasks.status_id
                WHERE tasks.status_id != 0";
        $result = $db->prepare($query);
        $result->execute();
        
        return $result->fetchAll();
    }

    function get_active_task($task_id = NULL)
    {
        global $db;
        if ($task_id == NULL)
        {
            throw new Exception("No task_id passed into get_active_task!");
        }
        
        $query = "SELECT tasks.id AS id,
                        tasks.title,
                        tasks.description,
                        statuses.id AS status_id,
                        statuses.name
                FROM tasks
                JOIN statuses
                    ON statuses.id = tasks.status_id
                WHERE tasks.id = :task_id";
        $result = $db->prepare($query);
        $result->execute(
            array(
                "task_id" => $task_id
            )
        );
        return $result->fetch();
    }

    function update_task_status($task_id = NULL, $status_id = NULL)
    {
        if ($task_id == NULL || $status_id == NULL)
        {
            throw new Exception("Not enough information passed into update_task_status");
        }
        
        global $db;
        
        $query = "UPDATE tasks
                SET status_id = :status_id
                WHERE tasks.id = :task_id";
        $result = $db->prepare($query);
        $success = $result->execute(
            array(
                "status_id" => $status_id, 
                "task_id" => $task_id
            )
        );
        return $success;
    }

?>