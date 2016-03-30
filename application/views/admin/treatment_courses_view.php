<?php defined('BASEPATH') OR exit('No direct script access allowed');

    if(isset($title))
        {
            echo '<h1>' . $title . '</h1>';
        }
        
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
        
<?php foreach($treatment_courses as $row){ ?>
        
        <tr data-toggle="collapse" data-target=<?php echo "#description$row->id"?> class="clickable">
            <td width="80%" contenteditable="true" onBlur="saveToDatabase(this,'course_name',<?php echo $row->id ?>)"><?php echo $row->course_name;?></td>
            <td width="10%" align="center" contenteditable="true" onBlur="saveToDatabase(this,'length',<?php echo $row->id ?>)"><?php echo $row->length;?></td>
            <td width="10%" align="center" contenteditable="true" onBlur="saveToDatabase(this,'NHS_best_practice',<?php echo $row->id ?>)"><?php echo $row->NHS_best_practice;?></td>
        </tr>
        <tr id="<?php echo 'description'.$row->id?>" class="collapse" >
            <td contenteditable="true" onBlur="saveToDatabase(this,'description',<?php echo $row->id ?>)"><?php echo $row->description;?></td>
        </tr>
<?php } ?>
    </tbody>
</table>


<p><?php echo anchor('admin/treatment_courses/addCourseForm') ?></p>




