<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<div class="row col-lg-12">     
    <p class="pull-right"><?php echo anchor('/referral/addReferralForm','<i class="glyphicon glyphicon-plus"></i> Create New Referral',array('class'=>'btn btn-primary')) ?></p></h2>
</div>

<div class="row table-responsive col-lg-12">          
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Urgency</th>
                <th>Patient NID</th>
                <th>Name</th>
                <th>Current Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user_referrals as $row){?>
                <tr class="clickable-row <?php echo $row->urgency_class ?>" data-href="<?php echo base_url("referral/patient_referral/".$row->id); ?>">
                    <td><?php echo $row->urgency ?></td>
                    <td><?php echo $row->patient_nid ?></td>
                    <td class="text-capitalize"><?php foreach($row->patient as $name){ echo "$name->first_name $name->last_name";  } ?></td>
                    <td ><?php echo $row->outcome ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
