<?php defined('BASEPATH') OR exit('No direct script access allowed');

    if(isset($title))
        {
            echo '<h1>' . $title . '</h1>';
        }
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Length</th>
                <th>Best Practice</th>
                <th>Description</th>
            </tr>
        </thead>
    <tbody>
<?php
    foreach($treatment_courses->result() as $row)
    {
?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <div class="row">
            <a href="<?php echo base_url('product/' . $row->id); ?>">
                <div class="col-lg-4 text-center">
                    <h4><?php echo $row->name; ?></h4>
                    <img class="img-responsive img-thumbnail img-square" src="<?php echo asset_url('images/products/' . $row->image) ; ?>" />
                    <?php if($row->quantity > 0){ ?>
                    <p style="color:green;">In Stock</p>
                    <?php }else{ ?>
                    <p style="color:red;">Out Of Stock</p>
                    <?php } ?>
                </div>
            </a>
        </div>
<?php
}
?>

</tbody>
</table>
<tr>
<td>amit</td>
<td>pastor</td>
<td>amit@example.com</td>
</tr>
<tr>
<td>sachin</td>
<td>joshi</td>
<td>sachin@example.com</td>
</tr>
<tr>
<td>nitin</td>
<td>sharma</td>
<td>nitin@example.com</td>
</tr>
