<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class='row'> <?php echo $title; ?> </div>

<?php echo form_open('admin/Medication/addMedicationForm',array('class'=>'form-horizontal')); ?>
    
    <div class='form-group'>
        <?php echo form_label('Medication Name', 'medication_name'); ?>
        <p><?php echo form_error('medication_name'); ?></p>
        <p><?php echo form_input('medication_name'); ?></p>
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Dosage Adult', 'dosage_adult');?></p>
        <p><?php echo form_error('dosage_adult');?></p>
        <p><?php echo form_input('dosage_adult'); ?></p>             
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Dosage Child', 'dosage_child');?></p>
        <p><?php echo form_error('dosage_child');?></p>
        <p><?php echo form_input('dosage_child'); ?></p>             
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Per Number of Hours', 'per_num_hours');?></p>
        <p><?php echo form_error('per_num_hours');?></p>
        <p><?php echo form_input('per_num_hours'); ?></p>             
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Description', 'description');?></p>
        <p><?php echo form_error('description');?></p>
        <p><?php echo form_input('description'); ?></p>
    </div>
               
<p><?php echo form_submit('submit', 'Save Medication' , 'class="btn btn-primary"');?></p>

<?php echo form_close();?>
