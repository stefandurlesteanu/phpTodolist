<?php

    $input = json_decode(file_get_contents('php://input'), true);
    $ceva = $input['data'][0]['taskName'];
    $altCeva = $database->addTask('Tasks', $input);
    exit (json_encode($altCeva));




//if(isset($_POST)) {
//    $dbData = array();
////    $keys = array_keys($_POST);
//    echo '<script type="text/javascript">echo();</script>';
//    $len = count($_POST['taskName']);
////    foreach ($_POST['taskName'] as $name)
////    var_dump($name);
////}
//
//    for ($i = 0; $i < $len; $i++) {
//        $dbData += array(
//            'taskName' => $_POST['taskName'][$i],
//            'taskDescription' => $_POST['taskDescription'][$i],
//            'taskDueDate' => $_POST['taskDueDate'][$i],
//            'taskImage' => $_POST['taskImage'][$i]
//        );
//    }
//var_dump($len);
//var_dump(array('taskName' => $_POST['taskName'][0],
//                'taskDescription' => $_POST['taskDescription'][0]));
//    var_dump($keys);
//    var_dump($len);

//}
//$url = '/Todolist/add';
//
//
//
//ob_start();
//header('Location: '.$url);
//ob_end_flush();
//die();
