<?php

function displayTable($data)
{
    $counter = 1;
    foreach ($data as $task) {
        echo '<tr id="'. $task['id'] .'">
            <td>' .$counter++.'</td>
            <td>' . $task['name'].'</td>           
            <td>'. $task['description'].'</td>           
            <td>'. $task['due_date'].'</td>            
            <td><img src="'. $task['image'].'" alt="" style="width: 8rem;"></td>           
            <td><input onchange="markComplete()" type="checkbox" id="scales" name="scales" '. ($task['done'] === 1 ? 'checked' : '') .'>
            <label for="scales"></label></td>          
            <td><button type="button" class="btn btn-primary" id="taskBtn'. $task['id'] .'" >Update</button></td>            
            <td><button type="button" class="btn btn-danger" id="taskBtn'. $task['id'] .'" onclick="deleteTask('. $task['id'] .')">Delete</button></td>
        </tr>';
    }
}

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

