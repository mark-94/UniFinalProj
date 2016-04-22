<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("login");?>
<div class="row">
  <p class=" col-lg-3">
      <label for="username">Username:</label>
    <?php echo form_input($identity);?>
  </p>
</div>
<div class="row">
  <p class=" col-lg-3">
    <label for="password">Password:</label>
    <?php echo form_input($password);?>
  </p>
</div>
<div class="row">
  <p class=" col-lg-3">
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
</div>

  <p><?php echo form_submit('submit', lang('login_submit_btn'),'class = "btn btn-primary"');?></p>

<?php echo form_close();?>
