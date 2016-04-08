<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php echo form_open('referral/addReferralForm',array('class'=>'form-horizontal')); ?>
<div class="row ">
    <div class="col-lg-6">  
        <div class='row form-group'>
            <div class="col-lg-2">
                <?php echo form_label('Patient ID', 'patient_nid'); ?>
                <p><?php echo form_error('patient_nid'); ?></p>
                <p><?php echo form_input($patient_nid); ?></p>
            </div>
        </div>        
        <div class='row form-group'>
            <div class="col-lg-4">
                <?php echo form_label('Forename', 'first_name'); ?>
                <p><?php echo form_error('first_name'); ?></p>
                <p><?php echo form_input($first_name); ?></p>
            </div>
        </div>
        <div class='form-group'>
            <div class="col-lg-4">
                <?php echo form_label('Surname', 'last_name'); ?>
                <p><?php echo form_error('last_name'); ?></p>
                <p><?php echo form_input($last_name); ?></p>
            </div>
        </div>
        <div class='form-group'>
            <div class="col-lg-3">
                <?php echo form_label('Date of Birth', 'DOB'); ?>
                <p><?php echo form_error('DOB'); ?></p>
                <p><?php echo form_input($DOB); ?></p>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class='form-group'>
            <div class="col-lg-4">
                <p><?php echo form_label('Diagnosis Name', 'diagnosis_names');?></p>
                <p><?php echo form_error('diagnosis_names');?></p>
                <p><?php echo form_dropdown('diagnosis_names',$diagnosis_names,'','class="form-control"'); ?></p>           
            </div>
        </div>
        <div class='form-group'>
            <div class="col-lg-4">
                <p><?php echo form_label('Username', 'usernames');?></p>
                <p><?php echo form_error('usernames');?></p>
                <p><?php echo form_dropdown('usernames',$usernames,'','class="form-control"'); ?></p>
            </div>
        </div>
        <div class='form-group'>
            <div class="col-lg-4">
                <p><?php echo form_label('Urgency', 'urgencies');?></p>
                <p><?php echo form_error('urgencies');?></p>
                <p><?php echo form_dropdown('urgencies',$urgencies,'','class="form-control"'); ?></p>
            </div>
        </div>
        <div class='form-group'>
            <div class="col-lg-5">
                <p><?php echo form_label('Redirected To', 'redirected_to');?></p>
                <p><?php echo form_error('redirected_to');?></p>
                <p><?php echo form_input($redirected_to); ?></p>
            </div>
        </div>
    </div>
</div>

    <div class='form-group row col-lg-12'>
        <p><?php echo form_label('Comment', 'comment');?></p>
        <p><?php echo form_error('comment');?></p>
        <p><?php echo form_textarea($comment); ?></p>
    </div>
               
<div class="row"><p class="col-lg-12"><?php echo form_submit('submit', 'Save Referral' , 'class="btn btn-primary"');?></p></div>

<?php echo form_close();?>

<pre><?php echo print_r($urgencies) ?></pre>