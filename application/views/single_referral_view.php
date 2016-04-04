<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row col-lg-12 text-capitalize"><?php if(isset($title)){ echo '<h2>'.$title.'</h2>' ; }?></div>
<div class="row col-lg-12">
    <div class="row col-lg-12">
        <div class="col-lg-6 pull-right">
            <div><strong>Referral created: </strong><?php echo $patient_referral->date_created ?></div>
            <div><strong>Last Updated: </strong><?php echo $patient_referral->last_update ?></div>
            <div><strong>Urgency: </strong><?php echo $urgency ?></div>
        </div>
    </div>
    <div class="row col-lg-12">
        <div class="row col-lg-6">
            <div><strong>Patient NID: </strong><?php echo $patient_details->nid ?></div>
            <div class="text-capitalize"><strong>Patient Name: </strong><?php echo "$patient_details->first_name $patient_details->last_name" ?></div>
            <div><strong>Patient DOB: </strong><?php echo $patient_details->DOB ?></div>
        </div>
    </div></br>
    <div class="row col-lg-12">
        <div><strong>Diagnosis: </strong><?php echo $diagnosis->diagnosis_name ?></div>
    </div></br>
    <div class="row col-lg-12">
        <div><strong>Notes:</strong></div>
        <div><?php echo $patient_referral->comment?></div>
    </div>
</div>
<div role="seperator" class="row col-lg-12 divider"></div>
<div class="row col-lg-12">
    <?php foreach($treatment_courses as $course){ ?>
    <div class="row">
        <div class="col-lg-6 pull-left">
            <div><?php echo $course->course_name?></div>
            <div><?php echo $course->length ?></div>
        </div><div class="col-lg-6 pull-right">
            <div><?php echo $course->NHS_best_practice ?></div>
        </div>
    </div></br>
    <div> <?php echo $course->description ?></div></br>
    <div class="divider"></div>
    <?php } ?>
    <?php echo '<pre>';print_r($treatment_courses);echo'</pre>' ?>
</div>
    
    