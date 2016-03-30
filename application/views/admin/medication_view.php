<?php defined('BASEPATH') OR exit('No direct script access allowed');

    if(isset($title))
        {
            echo '<h1>' . $title . '</h1>';
        }
        
?>
<table class="table table-hover table-bordered" id="treatment-table">
    <thead>
        <tr>
            <th>Medication</th>
            <th>Dosage Adult</th>
            <th>Dosage Child</th>
            <th>Per Number of Hours</th>
        </tr>
    </thead>
    <tbody>
        
<?php foreach($medication as $row){ ?>
        
        <tr data-toggle="collapse" data-target=<?php echo "#description$row->id"?> class="clickable">
            <td width="65%" contenteditable="true" onBlur="saveToDatabase(this,'medication_name',<?php echo $row->id ?>)"><?php echo $row->medication_name;?></td>
            <td width="10%" align="center" contenteditable="true" onBlur="saveToDatabase(this,'dosage_adult',<?php echo $row->id ?>)"><?php echo $row->dosage_adult;?></td>
            <td width="10%" align="center" contenteditable="true" onBlur="saveToDatabase(this,'dosage_child',<?php echo $row->id ?>)"><?php echo $row->dosage_child;?></td>
            <td width="15%" align="center" contenteditable="true" onBlur="saveToDatabase(this,'per_num_hours',<?php echo $row->id ?>)"><?php echo $row->per_num_hours;?></td>
        </tr>
        <tr id="<?php echo 'description'.$row->id?>" class="collapse" >
            <td contenteditable="true" onBlur="saveToDatabase(this,'description',<?php echo $row->id ?>)"><?php echo $row->description;?></td>
        </tr>
<?php } ?>
    </tbody>
</table>


<p><?php echo anchor('admin/medication/addMedicationForm') ?></p>

