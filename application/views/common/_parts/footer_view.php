    <?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>   
        <div class="container">

            <hr>

            <footer>
                <div class="row">

                    <div class="col-lg-4">

                        <a href="<?php echo base_url('page/about_us'); ?>">About Us</a><br/>
                        <a href="<?php echo base_url('page/privacy'); ?>">Privacy Policy</a><br/>
                        <a href="<?php echo base_url('page/terms'); ?>">Terms & Conditions</a><br/>
                    </div>

                    <div class="col-lg-4">
                    </div>

                    <?php if(isset($this->session->userdata['admin']) && $this->session->userdata['admin'] == 1){ ?>
                    <div class="col-lg-4">
                        <a href="<?php echo base_url('admin'); ?>">Administration</a>
                    </div>
                    <?php } else{ ?>
                    <div class="col-lg-4">
                        <h4>Phone:<a href="tel:(028) 1234 1234">(028) 1234 1234</a></h4>
                        <h4>Email:<a href="mailto:info@onlinestore.co.uk">info@onlinestore.co.uk</a></h4>
                    </div> 
                    <?php } ?>

                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright &copy; Company 2013</p>
                    </div>
                    <div class="col-lg-12">
                        <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.
                    </div>
                </div>
            </footer>

        </div>

    </body>
</html>