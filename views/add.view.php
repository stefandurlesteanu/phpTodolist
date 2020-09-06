<?php require 'layout/head.php' ?>


<div class="container" id="addTask" style="margin-top: 3rem;">
    <div style="text-align: right;">
        <button type="button" class="btn btn-success" onclick="addNewTask(); btnView()" style="border-radius: 50%;"><i class="fa fa-plus-square"></i></button>
        <button type="button" class="btn btn-danger" id="removeTaskBtn" onclick="removeTask(); btnView()" style="border-radius: 50%; display: none;" ><i class="fa fa-minus-square"></i></button>
    </div>

    <form  method="post" action="/Todolist/add" id="addForm" >
        <fieldset style="border:1px solid #ccc !important; padding: 1em 16px; border-radius: 16px; margin-bottom: 2rem;">
            <legend>New Task:</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="taskName">Name</label>
                    <input type="text" class="form-control" id="taskName" name="taskName[]">
                </div>
                <div class="form-group col-md-6">
                    <label for="taskDueDate">Due Date</label>
                    <input type="date" class="form-control" id="taskDueDate" name="taskDueDate[]">
                </div>
                <div class="form-group col-md-12">
                    <label for="taskDescription">Description</label>
                    <textarea class="form-control" id="taskDescription"></textarea>
                </div>
                <div class="form-group col-md-8">
                    <label for="taskImage">Image</label>
                    <input type="file" class="form-control-file" id="taskImage" name="taskImage[]">
                </div>
            </div>
        </fieldset>
    </form>
</div>

<script>


</script>

<?php require 'layout/footer.php' ?>
