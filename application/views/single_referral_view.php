<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row col-lg-12 text-capitalize"><?php if(isset($title)){ echo '<h2>'.$title.'</h2>' ; }?></div>
<div class="row col-lg-12">
    <div class="row col-lg-12">
        <div class="col-lg-6 pull-right">
            <p><strong>Referral created: </strong><?php echo $patient_referral->date_created ?></p>
            <p><strong>Last Updated: </strong><?php echo $patient_referral->last_update ?></p>
            <p><strong>Urgency: </strong><?php echo $urgency ?></p>
        </div>
    </div>
    <div class="row col-lg-12">
        <div class="row col-lg-6">
            <p><strong>Patient NID: </strong><?php echo $patient_details->nid ?></p>
            <p class="text-capitalize"><strong>Patient Name: </strong><?php echo "$patient_details->first_name $patient_details->last_name" ?></p>
            <p><strong>Patient DOB: </strong><?php echo $patient_details->DOB ?></p>
        </div><hr>
    </div>
    <div class="row col-lg-12">
        <p><strong>Diagnosis: </strong><?php echo $diagnosis->diagnosis_name ?></p>
    </div>
    <div class="row col-lg-12">
        <p><strong>Notes:</strong></p>
        <div><?php echo $patient_referral->comment?></div><hr>
    </div> 
</div>
   
<?php foreach($treatment_courses as $course){ ?>
    <div class="row col-lg-12">
        <div class="col-lg-4 pull-left">
            <p><?php echo $course->course_name?></p>
            <p><?php echo $course->length ?></p>
        </div>
        <div class="col-lg-4 pull-right">
            <p align="right"><?php echo $course->NHS_best_practice ?></p>
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-12"> <?php echo $course->description ?><hr></div>
    </div>
   
<?php } ?>

    
    