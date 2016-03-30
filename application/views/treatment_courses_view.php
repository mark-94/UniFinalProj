<?php defined('BASEPATH') OR exit('No direct script access allowed');

    if(isset($title))
        {
            echo '<h1>' . $title . '</h1>';
        }
        $count = 1;
?>
    <table class="table table-hover table-bordered" id="treatment-table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Length</th>
                <th>Best Practice</th>
                
            </tr>
        </thead>
        <tbody>
<?php
    foreach($treatment_courses as $row)
    {        
?>
        <tr data-toggle="collapse" data-target=<?php echo "#description$count"?> class="clickable">
            <td width="80%"><?php echo $row->course_name;?></td>
            <td width="10%" align="center"><?php echo $row->length;?></td>
            <td width="10%" align="center"><?php echo $row->NHS_best_practice;?></td>
            
        </tr>
        <tr>
            <td id="<?php echo 'description'.$count?>" class="collapse"><?php echo $row->description;?></td>
        </tr>
<?php
    $count++;}
?>
        </tbody>
    </table>

