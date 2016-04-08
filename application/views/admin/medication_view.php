<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row col-lg-12">
    <p class="pull-right"><?php echo anchor('admin/medication/addMedicationForm','<i class="glyphicon glyphicon-plus"></i> Add Medication',array('class'=>'btn btn-primary')) ?></p></h2>
</div>
<ul class="list-group medication-list row side-margin">
    <strong><div class="row row-eq-height col-lg-12">
        
            <div class="list-group-item col-xs-6">Medication</div>
            <div class="list-group-item col-xs-2" align="center">Dosage Adult</div>
            <div class="list-group-item col-xs-2" align="center">Dosage Child</div>
            <div class="list-group-item col-xs-2" align="center">Per Number of Hours</div>
       
    </div></strong>   
    <input class="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" style="display:none;">
<?php foreach($medication as $row){ ?>
    <div id="<?php echo $row->id ?>" class="inline-id">
        <div data-toggle="collapse" data-target="<?php echo "#description$row->id"?>" class="medication row row-eq-height col-lg-12 clickable">
            <div id="medication_name" class="list-group-item col-xs-6 inline-edit" type="text" contenteditable="true"><?php echo $row->medication_name;?></div>
            <div id="dosage_adult" class="list-group-item col-xs-2 inline-edit" type="number" align="center" contenteditable="true"><?php echo $row->dosage_adult;?></div>
            <div id="dosage_child" class="list-group-item col-xs-2 inline-edit" type="number" align="center" contenteditable="true"><?php echo $row->dosage_child;?></div>
            <div id="per_num_hours" class="list-group-item col-xs-2 inline-edit" type="number" align="center" contenteditable="true"><?php echo $row->per_num_hours;?></div>
        </div>
        <div id="<?php echo 'description'.$row->id?>" class="collapse row col-xs-12">
            <div id="description" class="list-group-item col-xs-12 scrollDiv inline-edit" type="text" contenteditable="true"><?php echo $row->description;?></div>
        </div>
    </div>
    
<?php } ?>
</ul>




