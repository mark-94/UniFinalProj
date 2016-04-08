<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<h1><?php echo $title ?></h1></br>
<div class="row">
    <div class=" col-lg-3"> 
        <p><?php echo anchor('auth','List of All Users',array('class'=>'btn btn-primary')) ?></p>
        <p><?php echo anchor('auth/create_user','<i class="glyphicon glyphicon-plus"></i> Register New User',array('class'=>'btn btn-primary')) ?></p>
    </div>
    <div class="col-lg-3">
        <p><?php echo anchor('admin/diagnosis','List of All Diagnoses',array('class'=>'btn btn-primary')) ?></p>
        <p><?php echo anchor('admin/diagnosis/addDiagnosisForm','<i class="glyphicon glyphicon-plus"></i> Add New Diagnosis',array('class'=>'btn btn-primary')) ?></p>
    </div>
    <div class="col-lg-3"
        <p><?php echo anchor('admin/treatment_courses','List of All Treatment Courses',array('class'=>'btn btn-primary')) ?></p>
        <p><?php echo anchor('admin/treatment_courses/addCourseForm','<i class="glyphicon glyphicon-plus"></i> Add New Treatment Course',array('class'=>'btn btn-primary')) ?></p>
    </div>
    <div class="col-lg-3">
        <p><?php echo anchor('admin/medication','List of All Medication',array('class'=>'btn btn-primary')) ?></p>
        <p><?php echo anchor('admin/medication/addMedicationForm','<i class="glyphicon glyphicon-plus"></i> Add New Medication',array('class'=>'btn btn-primary')) ?></p>
    </div>
</div>