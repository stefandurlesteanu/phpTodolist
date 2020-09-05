<?php require 'layout/head.php' ?>

<h1>About Page </h1>
<?php
    foreach ($aal as $a)
    {
    echo $a->name . '<br>';
    }
?>
<?php require 'layout/footer.php' ?>
