<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('admin/Medication/addMedicationForm',array('class'=>'form-horizontal')); ?>
<div class="row col-lg-12">
    <div class='col-lg-3 form-group'>
        <p><?php echo form_label('Medication Name', 'medication_name'); ?></p>
        <p><?php echo form_error('medication_name'); ?></p>
        <p><?php echo form_input($medication_name); ?></p>
    </div>
    <div class="col-lg-1"></div>
    <div class='col-lg-2 form-group'>
        <p><?php echo form_label('Dosage Adult', 'dosage_adult');?></p>
        <p><?php echo form_error('dosage_adult');?></p>
        <p class="row col-lg-8"><?php echo form_input($dosage_adult); ?></p>             
    </div>
</div>
<div class="row col-lg-12">
    <div class='col-lg-2 form-group'>
        <p><?php echo form_label('Per Number of Hours', 'per_num_hours');?></p>
        <p><?php echo form_error('per_num_hours');?></p>
        <p class="row col-lg-8"><?php echo form_input($per_num_hours); ?></p>             
    </div>
    <div class="col-lg-2"></div>
    <div class='col-lg-2 form-group'>
        <p><?php echo form_label('Dosage Child', 'dosage_child');?></p>
        <p><?php echo form_error('dosage_child');?></p>
        <p class="row col-lg-8"><?php echo form_input($dosage_child); ?></p>             
    </div>
</div>
<div class='row col-lg-12 form-group'>
    <p><?php echo form_label('Description', 'description');?></p>
    <p><?php echo form_error('description');?></p>
    <p><?php echo form_textarea($description); ?></p>
</div>
               
<div class="row col-lg-12"<p><?php echo form_submit('submit', 'Save Medication' , 'class="btn btn-primary"');?></p>

<?php echo form_close();?>
