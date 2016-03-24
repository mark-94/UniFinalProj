<?php defined('BASEPATH') OR exit('No direct script access allowed');

    if(isset($title))
        {
            echo '<h1>' . $title . '</h1>';
        }
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Length</th>
                <th>Best Practice</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach($treatment_courses->result() as $row)
    {
?>
        <tr>
            <td><?php echo $row->courses_name;?></td>
            <td><?php echo $row->length;?></td>
            <td><?php echo $row->NHS_best_practice;?></td>
            <td><?php echo $row->description;?></td>
        </tr>
<?php
    }
?>
        </tbody>
    </table>
