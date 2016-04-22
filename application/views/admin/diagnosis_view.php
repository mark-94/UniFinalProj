<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row ">     
    <p class="pull-right"><?php echo anchor('admin/diagnosis/addDiagnosisForm','<i class="glyphicon glyphicon-plus"></i> Add Diagnosis',array('class'=>'btn btn-primary')) ?></p>
</div>
<ul class="list-group row diagnosis-list side-margin">
    <input class="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" style="display:none;">
<?php foreach($diagnosis as $row){ ?>
    <div id="<?php echo $row->id ?>" class="diag-treat inline-id" >
        <strong><div id="diagnosis_name" class="list-group-item row clickable inline-edit" type="text" data-toggle="collapse" data-field="diagnosis_name" data-target="<?php echo "#description$row->id" ?>" contenteditable="true"><?php echo $row->diagnosis_name ?></div></strong>
        <div id="<?php echo 'description'.$row->id?>" class="collapse row scrollDiv ">
            <div  id="description" class="list-group-item col-lg-9 inline-edit" type="text" contenteditable="true" ><?php echo $row->description ?></div>
            <div class="col-lg-3 ">
                <div class="dropdown row">
                    <button class="btn btn-default list-group-item dropdown-toggle pull-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select a course to add...
                        <span class="caret "></span>
                    </button>
                    <ul id="<?php echo "unselected_list$row->id" ?>" class="list-group dropdown-menu dropdown-menu-right dropdown-menu-width-match-parent unselected-list de-pad" aria-labelledby="dropdownMenu1">
                        <?php foreach($row->unselected_courses as $unselected_course){ ?>
                            <button id="<?php echo "$unselected_course->id" ?>" class="list-group-item btn-width-match-parent unselected"><?php echo $unselected_course->course_name ?></button>
                        <?php } ?> 
                    </ul>
                </div>
                <div class="row ">
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


