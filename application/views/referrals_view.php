<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="row col-lg-12"><?php if(isset($title)){ echo '<h2>'.$title.'</h2>' ; }?></div>

<div class="row table-responsive col-lg-12">          
    <table class="table">
        <thead>
            <tr>
                <th>Urgency?</th>
                <th>Patient NID</th>
                <th>Name</th>
                <th>Outcome</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user_referrals as $row){?>
                <tr>
                    <td><?php echo $row->urgency ?></td>
                    <td><?php echo $row->patient_nid ?></td>
                    <td><?php foreach($row->patient as $name){ echo $name->first_name.' '.$name->last_name; } ?></td>
                    <td><?php echo $row->outcome ?></td>
                    <td>New York</td>
                    <td>USA</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
