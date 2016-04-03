<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row col-lg-12"><?php if(isset($title)){ echo '<h2>'.$title ; }?>
    <p class="pull-right"><?php echo anchor('admin/medication/addMedicationForm','Add Medication',array('class'=>'btn btn-primary')) ?></p></h2>
</div>
<ul class="list-group medication-list row side-margin">
    <div class="row col-lg-12">
        
            <div class="list-group-item col-lg-6">Medication</div>
            <div class="list-group-item col-lg-2" align="center">Dosage Adult</div>
            <div class="list-group-item col-lg-2" align="center">Dosage Child</div>
            <div class="list-group-item col-lg-2" align="center">Per Number of Hours</div>
       
    </div>        
<?php foreach($medication as $row){ ?>
    
        <div data-toggle="collapse" data-target="<?php echo "#description$row->id"?>" class="medication row col-lg-12 clickable">
            <div class="list-group-item col-lg-6" contenteditable="true" onBlur="saveToDatabase(this,'medication_name',<?php echo $row->id ?>)"><?php echo $row->medication_name;?></div>
            <div class="list-group-item col-lg-2" align="center" contenteditable="true" onBlur="saveToDatabase(this,'dosage_adult',<?php echo $row->id ?>)"><?php echo $row->dosage_adult;?></div>
            <div class="list-group-item col-lg-2" align="center" contenteditable="true" onBlur="saveToDatabase(this,'dosage_child',<?php echo $row->id ?>)"><?php echo $row->dosage_child;?></div>
            <div class="list-group-item col-lg-2" align="center" contenteditable="true" onBlur="saveToDatabase(this,'per_num_hours',<?php echo $row->id ?>)"><?php echo $row->per_num_hours;?></div>
        </div>
        <div id="<?php echo 'description'.$row->id?>" class="collapse row col-lg-12">
            <div class="list-group-item col-lg-12 scrollDiv" >
                <div contenteditable="true" onBlur="saveToDatabase(this,'description',<?php echo $row->id ?>)"><?php echo $row->description;?></div>
            </div>
        </div>
    
<?php } ?>
</ul>




