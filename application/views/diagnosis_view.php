<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row ">    
    <?php  if(isset($title)){echo '<h2>'.$title.'</h2>';}?>  
</div>
<ul class="list-group row diagnosis-list side-margin">
    
<?php foreach($diagnosis as $row){ ?>
    <div id="<?php echo $row->id ?>" class="diagnosis">
        <div id="<?php echo $row->id ?>" class="list-group-item row clickable" data-toggle="collapse" data-target="<?php echo "#description$row->id"?>" >
            <div><strong><?php echo $row->diagnosis_name ?></strong></div>
        </div>
        <div id="<?php echo 'description'.$row->id?>" class="collapse row ">
            <div  class="list-group-item col-lg-9 scrollDiv">
                <div id="description"><?php echo $row->description ?></div>
            </div>
            <div class="col-lg-3 scrollDiv">
                
                <div class="row">
                    <ul id="<?php echo "selected_list$row->id" ?>" class="list-group selected-list de-margin ">
                        <?php foreach($row->courses as $course){ ?>
                            <li id="<?php echo "$course->id" ?>" class="list-group-item course"><?php echo $course->course_name ?></li>                             
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    
</ul>
