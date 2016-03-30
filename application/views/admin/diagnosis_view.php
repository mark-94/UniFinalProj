<?php defined('BASEPATH') OR exit('No direct script access allowed');

    if(isset($title))
        {
            echo '<h1>' . $title . '</h1>';
        }
?>
<table class="table table-hover table-bordered" id="diagnosis-table">
    <thead>
        <tr>
            <th>Diagnosis Name</th>
        </tr>
    </thead>
    <tbody>
        
<?php foreach($diagnosis as $row){ ?>
        
        <tr data-toggle="collapse" data-target=<?php echo "#description$row->id"?> class="clickable">
            <td contenteditable="true" onBlur="saveToDatabase(this,'diagnosis_name',<?php echo $row->id ?>)"><?php echo $row->diagnosis_name ?></td>
        </tr>
        <tr id="<?php echo 'description'.$row->id?>" class="collapse">
            <td  contenteditable="true" onBlur="saveToDatabase(this,'description',<?php echo $row->id ?>)"><?php echo $row->description ?></td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Select a course to add...
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li>tets</li>
                    </ul>
                </div>
                <div>
                    <?php foreach($row->courses as $course){ ?>
                    <div id="<?php echo $course->id ?>"><?php echo $course->course_name ?></div>
                    <?php } ?>
                </div>
            </td>
        </tr>
<?php } ?>
    </tbody>
</table>


<p><?php echo anchor('admin/diagnosis/addDiagnosisForm') ?></p>
