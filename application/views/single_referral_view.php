<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row col-lg-12 text-capitalize"><?php if(isset($title)){ echo '<h2>'.$title.'</h2>' ; }?></div>
<input class="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" style="display:none;">
<div id="<?php echo $patient_referral->id ?>" class="row col-lg-12 inline-id">
    <div class="row ">
        <div class="col-lg-6 pull-right" >
        <div><strong>Referral created: </strong><?php echo $patient_referral->date_created ?></div>
        <div ><strong>Last Updated: </strong><?php echo $patient_referral->last_update ?></div>
        <div class="<?php echo $urgency_class ?>"><strong>Urgency: </strong><?php echo $urgency ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div><strong>Patient NID: </strong><?php echo $patient_details->nid ?></div>
            <div class="text-capitalize"><strong>Patient Name: </strong><?php echo "$patient_details->first_name $patient_details->last_name" ?></div>
            <div><strong>Patient DOB: </strong><?php echo $patient_details->DOB ?></div>
        </div><hr>
    </div>
    <div class="row col-lg-12">
        <div><strong>Diagnosis: </strong><?php echo $diagnosis->diagnosis_name ?></div>
    </div>
    <div class="row col-lg-12">
        <div><strong>Notes:</strong></div>
        <div id="comment" class="inline-edit" contenteditable="true" type="text"><?php echo $patient_referral->comment?></div><hr>
    </div> 
</div>
<div class="row col-lg-12">
<?php foreach($treatment_courses as $course){ ?>
   
        
        <div><?php echo $course->course_name?></div>
        <div><?php echo $course->length ?></div>
        
        
        <div align="right"><?php echo $course->NHS_best_practice ?></div>
      
     
    
        <div class=""> <?php echo $course->description ?></div><hr>
  
   
<?php } ?>
</div>