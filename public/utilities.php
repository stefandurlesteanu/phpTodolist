<?php

function displayTable($data)
{

        foreach ($data as $task) {
            echo '<tr>
                 <th scope="row">1</th>
                 <td>' . $task->name.'</td>
             </tr>
             <tr>
                 <th scope="row">2</th>
                 <td>'. $task->description.'</td>
             </tr>
             <tr>
                 <th scope="row">3</th>
                 <td>'. $task->due_date.'</td>
             </tr>
            <tr>
                 <th scope="row">4</th>
                 <td>'. $task->image.'</td>
             </tr>
            <tr>
                 <th scope="row">5</th>
                 <td>'. $task->done.'</td>
             </tr>
             <tr>
                 <th scope="row">6</th>
                 <td>Update</td>
             </tr>
             <tr>
                 <th scope="row">7</th>
                 <td>Delete</td>
             </tr>';
        }

}