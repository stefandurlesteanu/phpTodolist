<?php

$router->define([
    'Todolist' => 'controllers/index.php',
    'Todolist/about' => 'controllers/about.php',
    'Todolist/about/culture' => 'controllers/about-culture.php',
    'Todolist/contact' => 'controllers/contact.php',
    'Todolist/models/index-model' => 'models/index.model.php',
    'Todolist/models/index-show-table' => 'models/indexShowTable.model.php'
]);