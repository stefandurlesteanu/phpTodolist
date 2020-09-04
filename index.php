<?php


   $query = require 'booting.php';


   $tasks = $query->selectAll('Tasks');

    var_dump($tasks);