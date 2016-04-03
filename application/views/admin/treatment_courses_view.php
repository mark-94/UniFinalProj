<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <?php if(isset($title)){echo '<h2>'.$title; }?><p><?php echo anchor('admin/treatment_courses/addCourseForm','Add Course', array('class'=>'btn btn-primary')) ?></p></h2>
</div>            

<ul class="list-group treatment-course-list row side-margin">

    <div class="row col-lg-12">        
        <div class="list-group-item col-lg-8" ><strong>Course Name</strong></div>
        <div class="list-group-item col-lg-2" align="center"><strong>Length</strong></div>
        <div class="list-group-item col-lg-2" align="center"><strong>Best Practice</strong></div>
    </div>
        
<?php foreach($treatment_courses as $row){ ?>
    
        <div id="<?php echo $row->id ?>"  class="treatment-courses row col-lg-12 clickable" data-toggle="collapse" data-target="<?php echo "#description$row->id" ?>" >
            <div class="list-group-item col-lg-8" contenteditable="true" onBlur="saveToDatabase(this,'course_name',<?php echo $row->id ?>)"><?php echo $row->course_name;?></div>
            <div class="list-group-item col-lg-2" align="center" contenteditable="true" onBlur="saveToDatabase(this,'length',<?php echo $row->id ?>)"><?php echo $row->length;?></div>
            <div class="list-group-item col-lg-2" align="center" contenteditable="true" onBlur="saveToDatabase(this,'NHS_best_practice',<?php echo $row->id ?>)"><?php echo $row->NHS_best_practice;?></div>
        </div>
        <div id="<?php echo 'description'.$row->id?>" class="row collapse col-lg-12">
            <div class="list-group-item col-lg-12 scrollDiv">
                <div contenteditable="true" onBlur="saveToDatabase(this,'description',<?php echo $row->id ?>)"><?php echo $row->description;?></div>
            </div>
        </div>
    
<?php } ?>

</ul>






