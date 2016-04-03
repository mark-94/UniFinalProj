<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row ">    
    <?php  if(isset($title)){echo '<h2>'.$title;}?>   
    <p class="pull-right"><?php echo anchor('admin/diagnosis/addDiagnosisForm','Add Diagnosis',array('class'=>'btn btn-primary')) ?></p></h2>
</div>
<ul class="list-group row diagnosis-list side-margin">
    
<?php foreach($diagnosis as $row){ ?>
    <div id="<?php echo $row->id ?>" class="diagnosis ">
        <div id="<?php echo $row->id ?>" class="list-group-item row clickable " data-toggle="collapse" data-target="<?php echo "#description$row->id"?>" >
            <div contenteditable="true" onBlur="saveToDatabase(this,'diagnosis_name',<?php echo $row->id ?>)"><strong><?php echo $row->diagnosis_name ?></strong></div>
        </div>
        <div id="<?php echo 'description'.$row->id?>" class="collapse row ">
            <div  class="list-group-item col-lg-9 scrollDiv">
                <div id="description" contenteditable="true"  onBlur="saveToDatabase(this,'description',<?php echo $row->id ?>)"><?php echo $row->description ?></div>
            </div>
            <div class="col-lg-3 scrollDiv">
                <div class="dropdown row">
                    <button class="btn btn-default list-group-item dropdown-toggle pull-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select a course to add...
                        <span class="caret "></span>
                    </button>
                    <ul id="<?php echo "unselected_list$row->id" ?>" class="list-group dropdown-menu dropdown-menu-right unselected-list de-pad" aria-labelledby="dropdownMenu1">
                        <?php foreach($row->unselected_courses as $unselected_course){ ?>
                            <button id="<?php echo "$unselected_course->id" ?>" class="list-group-item btn btn-default unselected"><?php echo $unselected_course->course_name ?></button>
                        <?php } ?> 
                    </ul>
                </div>
                <div class="row">
                    <ul id="<?php echo "selected_list$row->id" ?>" class="list-group selected-list de-margin ">
                        <?php foreach($row->courses as $course){ ?>
                            <li id="<?php echo "$course->id" ?>" class="list-group-item course"><?php echo $course->course_name ?><a href="#" id="deselect" class="pull-right"><i class="glyphicon glyphicon-remove"></i></a></li>                             
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    
</ul>


