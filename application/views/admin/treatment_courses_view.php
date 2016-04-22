<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row">
    <p class="pull-right"><?php echo anchor('admin/treatment_courses/addCourseForm','<i class="glyphicon glyphicon-plus"></i> Add Course', array('class'=>'btn btn-primary')) ?></p></h2>
</div>            

<ul class="list-group treatment-course-list row side-margin">

    <div class="row row-eq-height">        
        <div class="list-group-item col-lg-8" ><strong>Course Name</strong></div>
        <div class="list-group-item col-lg-2" align="center"><strong>Length</strong></div>
        <div class="list-group-item col-lg-2" align="center"><strong>Best Practice</strong></div>
    </div>
    <input class="token" type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" style="display:none;">    
<?php foreach($treatment_courses as $row){ ?>
    <div id="<?php echo $row->id ?>" class="diag-treat inline-id">
        <div id="<?php echo $row->id ?>"  class=" row clickable row-eq-height treatment-courses" data-toggle="collapse" data-target="<?php echo "#description$row->id" ?>" >
            <div id="course_name" class="list-group-item col-lg-8 inline-edit" type="text" contenteditable="true"><?php echo $row->course_name;?></div>
            <div id="length" class="list-group-item col-lg-2 inline-edit" type="number" align="center" contenteditable="true"><?php echo $row->length;?></div>
            <div id="NHS_best_prctice" class="list-group-item col-lg-2 inline-edit" align="center" contenteditable="true"><?php echo $row->NHS_best_practice;?></div>
        </div>
        <div id="<?php echo 'description'.$row->id?>" class="row collapse">
            <div id="description" class="list-group-item col-lg-9 scrollDiv inline-edit" type="text" contenteditable="true" ><?php echo $row->description;?></div>
            <div class="col-lg-3 ">
                <div class="dropdown row">
                    <button class="btn btn-default list-group-item dropdown-toggle pull-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select a medication to add...
                        <span class="caret "></span>
                    </button>
                    <ul id="<?php echo "unselected_list$row->id" ?>" class="list-group dropdown-menu dropdown-menu-right dropdown-menu-width-match-parent unselected-list de-pad" aria-labelledby="dropdownMenu1">
                        <?php foreach($row->unselected_medication as $unselected_medication){ ?>
                            <button id="<?php echo "$unselected_medication->id" ?>" class="list-group-item btn-width-match-parent unselected"><?php echo $unselected_medication->medication_name ?></button>
                        <?php } ?> 
                    </ul>
                </div>
                <div class="row ">
                    <ul id="<?php echo "selected_list$row->id" ?>" class="list-group selected-list de-margin ">
                        <?php foreach($row->medication as $medication){ ?>
                            <li id="<?php echo "$medication->id" ?>" class="list-group-item course"><?php echo $medication->medication_name ?><a href="#" id="deselect" class="pull-right"><i class="glyphicon glyphicon-remove"></i></a></li>                             
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</ul>





