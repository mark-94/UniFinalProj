<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class='row'> <?php echo $title; ?> </div>

<?php echo form_open('admin/diagnosis/addDiagnosisForm',array('class'=>'form-horizontal')); ?>
    
    <div class='form-group'>
        <?php echo form_label('Diagnosis Name', 'diagnosis_name'); ?>
        <p><?php echo form_error('diagnosis_name'); ?></p>
        <p><?php echo form_input('diagnosis_name'); ?></p>
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Description', 'description');?></p>
        <p><?php echo form_error('description');?></p>
        <p><?php echo form_input('description'); ?></p>
    </div>
               
<p><?php echo form_submit('submit', 'Save Diagnosis' , 'class="btn btn-primary"');?></p>

<?php echo form_close();?>

