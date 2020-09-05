<?php require 'layout/head.php' ?>

<div class="container" style="margin-top: 2rem;">
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Due Date</th>
            <th scope="col">Image</th>
            <th scope="col">Done</th>
            <th scope="col">Update</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
            <?php displayTable($tasks)?>
        </tbody>
    </table>
</div>
<?php require 'layout/footer.php' ?>