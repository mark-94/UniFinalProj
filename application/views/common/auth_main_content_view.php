<?php defined('BASEPATH') OR exit('No direct script access allowed');
  $this->load->view('common/_parts/auth_header_view');
?>

    <div class="container">
        
            <?php echo $the_view_content;?>
        
    </div>

<?php
$this->load->view('common/_parts/auth_footer_view');
?>