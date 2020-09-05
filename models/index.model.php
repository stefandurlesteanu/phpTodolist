<?php
    $tasks = $database->selectAll('Tasks');
    exit(json_encode($tasks));