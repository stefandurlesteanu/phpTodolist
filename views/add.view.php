<?php require 'layout/head.php' ?>

<?php

$imageErr = '';
$imageSuccess = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dbData = array();
    $len = count($_POST['taskName']);
    for ($i = 0; $i < $len; $i++) {
        $imgValidationResponse = checkImage($i);
        if (strpos($imgValidationResponse, '/')) {
            $dbData[] = array(
                'taskName' => test_input($_POST['taskName'][$i]),
                'taskDescription' => test_input($_POST['taskDescription'][$i]),
                'taskDueDate' => $_POST['taskDueDate'][$i],
                'taskImage' => $imgValidationResponse
            );
        } else {
            $imageErr .= $imgValidationResponse;
        }
    }

    if (strlen($imageErr) === 0) {
        $jsonData = json_encode($dbData);


        echo '<script type="text/javascript">
                insertDB(' . $jsonData . ')
            </script>';
        $imageSuccess .= "Task successfully added!";

    }
//    sleep(3);
//    redirect('/Todolist/add');
}



?>

<div class="container" id="addTask" style="margin-top: 3rem;">
    <div style="text-align: right;">
        <button type="button" class="btn btn-success" onclick="addNewTask(); btnView(); event.preventDefault();" style="border-radius: 50%;"><i class="fa fa-plus-square"></i></button>
        <button type="button" class="btn btn-danger" id="removeTaskBtn" onclick="removeTask(); btnView(); event.preventDefault();" style="border-radius: 50%; display: none;" ><i class="fa fa-minus-square"></i></button>
    </div>

    <span class="alert-danger" role="alert"><?= $imageErr ?></span>
    <span class="alert-success" role="alert"><?= $imageSuccess?></span>

    <form  method="post" action="/Todolist/add"  enctype="multipart/form-data">
        <div id="addForm">
            <fieldset style="border:1px solid #ccc !important; padding: 1em 16px; border-radius: 16px; margin-bottom: 2rem;">
                <legend>New Task:</legend>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="taskName">Name</label>
                        <input type="text" class="form-control" id="taskName" name="taskName[]" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="taskDueDate">Due Date</label>
                        <input type="date" class="form-control" id="taskDueDate" name="taskDueDate[]" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="taskDescription">Description</label>
                        <textarea class="form-control" id="taskDescription" name="taskDescription[]"></textarea>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="taskImage">Image</label>
                        <input type="file" class="form-control-file " id="taskImage" name="taskImage[]">
                    </div>
                </div>
            </fieldset>
        </div>
        <input type="submit" name="submit" value="Add Your TODOs" class="btn btn-block btn-lg btn-outline-dark" style="margin-bottom: 10rem">
    </form>
</div>

<?php require 'layout/footer.php' ?>



<!--/Todolist/models/add.model.php-->