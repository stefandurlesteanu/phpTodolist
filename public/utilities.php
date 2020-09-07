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


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function checkImage($id)
{
    $imgErr = "";
    $target_dir = "/opt/lampp/htdocs/Todolist/public/img/";
    $target_file = $target_dir . basename($_FILES["taskImage"]["name"][$id]);
    $dbName = "public/img/" . basename($_FILES["taskImage"]["name"][$id]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["taskImage"]["tmp_name"][$id]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $imgErr = "File is not an image. <br>";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $imgErr .= "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["taskImage"]["size"][$id] > 500000) {
        $imgErr .= "Sorry, your file is too large. <br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"
        && $imageFileType !== "gif") {
        $imgErr .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk === 0) {
        $imgErr .= "Sorry, your file was not uploaded.<br>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["taskImage"]["tmp_name"][$id], $target_file)) {
            return $dbName;
        } else {
            $imgErr .= "Sorry, there was an error uploading your file. <br>";
        }
    }
    return $imgErr;
}

