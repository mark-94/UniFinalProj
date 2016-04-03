<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class='row'> <?php echo $title; ?> </div>

<?php echo form_open('referral/addReferralForm',array('class'=>'form-horizontal')); ?>
    
    <div class='form-group'>
        <?php echo form_label('Patient ID', 'patient_nid'); ?>
        <p><?php echo form_error('patient_nid'); ?></p>
        <p><?php echo form_input($patient_nid); ?></p>
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Diagnosis Name', 'diagnosis_name');?></p>
        <p><?php echo form_error('diagnosis_name');?></p>
        <p><?php echo form_input($diagnosis_name); ?></p>             
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Username', 'username');?></p>
        <p><?php echo form_error('username');?></p>
        <p><?php echo form_input($username); ?></p>
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Urgency', 'urgency');?></p>
        <p><?php echo form_error('urgency');?></p>
        <p><?php echo form_input($urgency); ?></p>
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Redirected To', 'redirected_to');?></p>
        <p><?php echo form_error('redirected_to');?></p>
        <p><?php echo form_input($redirected_to); ?></p>
    </div>
    <div class='form-group'>
        <p><?php echo form_label('Comment', 'comment');?></p>
        <p><?php echo form_error('comment');?></p>
        <p><?php echo form_textarea($comment); ?></p>
    </div>
               
<p><?php echo form_submit('submit', 'Save Referral' , 'class="btn btn-primary"');?></p>

<?php echo form_close();?>
