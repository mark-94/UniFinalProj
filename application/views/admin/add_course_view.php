<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class='row'> <?php echo $title; ?> </div>

<?php echo form_open('admin/treatment_courses/addCourseForm',array('class'=>'form-horizontal')); ?>
    
    <div class='form-group'>
        <?php echo form_label('Course Name', 'course_name'); ?>
        <p><?php echo form_error('course_name'); ?></p>
        <p><?php echo form_input('course_name'); ?></p>
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Length In Weeks', 'length');?></p>
        <p><?php echo form_error('length');?></p>
        <p><?php echo form_input('length'); ?></p>             
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Best Practice?', 'best_practice');?></p>
        <p><?php echo form_checkbox('best_practice', '1', FALSE);?></p>              
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Description', 'description');?></p>
        <p><?php echo form_error('description');?></p>
        <p><?php echo form_input('description'); ?></p>
    </div>
               
<p><?php echo form_submit('submit', 'Save Course' , 'class="btn btn-primary"');?></p>

<?php echo form_close();?>


         