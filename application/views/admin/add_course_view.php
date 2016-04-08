<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('admin/treatment_courses/addCourseForm',array('class'=>'form-horizontal')); ?>

<div class="row col-lg-12">
    <div class="col-lg-4 form-group">
        <p><?php echo form_label('Course Name', 'course_name'); ?></p>
        <p><?php echo form_error('course_name'); ?></p>
        <p><?php echo form_input($course_name); ?></p>
    </div>

</div>
<div class="row col-lg-12">
    <div class="col-lg-2 form-group">
        <p><?php echo form_label('Length In Weeks', 'length');?></p>
        <p><?php echo form_error('length');?></p>
        <p class="row col-lg-8"><?php echo form_input($length); ?></p> 
    </div>
    <div class="col-lg-2  form-group" align="center">
        <p><?php echo form_label('Best Practice?', 'best_practice');?></p>
        <p><?php echo form_checkbox('best_practice', '1', FALSE);?></p>              
        </div>
</div>
<div class="row col-lg-12 form-group">
    <p><?php echo form_label('Description', 'description');?></p>
    <p><?php echo form_error('description');?></p>
    <p><?php echo form_textarea($description); ?></p>
</div>
<div class="row col-lg-12">
<?php echo form_submit('submit', 'Save Course' , 'class="btn btn-primary"');?>
</div>
<?php echo form_close();?>


         