<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('admin/diagnosis/addDiagnosisForm',array('class'=>'form-horizontal')); ?>
    <div class="row col-lg-12">
        <div class='row col-lg-4 form-group'>
            <p><?php echo form_label('Diagnosis Name', 'diagnosis_name'); ?></p>
            <p><?php echo form_error('diagnosis_name'); ?></p>
            <p><?php echo form_input($diagnosis_name); ?></p>
        </div>
    </div>
    <div class='row col-lg-12 form-group'>
        <p><?php echo form_label('Description', 'description');?></p>
        <p><?php echo form_error('description');?></p>
        <p><?php echo form_textarea($description); ?></p>
    </div>
               
<div class="row col-lg-12"><p><?php echo form_submit('submit', 'Save Diagnosis' , 'class="btn btn-primary"');?></p></div>

<?php echo form_close();?>

