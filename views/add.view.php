<?php require 'layout/head.php' ?>

<?php

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $dbData = array();
    $len = count($_POST['taskName']);
    for ($i = 0; $i < $len; $i++) {
        $dbData[] = array(
            'taskName' => test_input($_POST['taskName'][$i]),
            'taskDescription' => test_input($_POST['taskDescription'][$i]),
            'taskDueDate' => $_POST['taskDueDate'][$i],
            'taskImage' => $_POST['taskImage'][$i]
        );
    }

    $jsonData = json_encode($dbData);


    echo '<script type="text/javascript">
        insertDB(' .$jsonData . ')
    </script>';


//    if (empty($_POST["name"])) {
//        $nameErr = "Name is required";
//    } else {
//        $name = test_input($_POST["name"]);
//    }

}

?>

<div class="container" id="addTask" style="margin-top: 3rem;">
    <div style="text-align: right;">
        <button type="button" class="btn btn-success" onclick="addNewTask(); btnView(); event.preventDefault();" style="border-radius: 50%;"><i class="fa fa-plus-square"></i></button>
        <button type="button" class="btn btn-danger" id="removeTaskBtn" onclick="removeTask(); btnView()" style="border-radius: 50%; display: none;" ><i class="fa fa-minus-square"></i></button>
    </div>

    <form  method="post" action="/Todolist/add"  >
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
        <input type="submit" value="Add Your TODOs" class="btn btn-block btn-lg btn-outline-dark" style="margin-bottom: 10rem">
    </form>
</div>

<?php require 'layout/footer.php' ?>



<!--/Todolist/models/add.model.php-->