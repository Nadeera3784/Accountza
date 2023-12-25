    
       <footer class="footer pl-30 pr-30">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p>2020 &copy; <?php echo $this->config_manager->config['app_name'];?></p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p>Follow Us</p>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

</div>
    <script src="<?php echo base_url() . $this->config->item('app_backend_asset_root');?>/js/jquery.js"></script>
    <script src="<?php echo base_url() . $this->config->item('app_backend_asset_root');?>/js/bootstrap.js"></script>
    <script src="<?php echo base_url() . $this->config->item('app_backend_asset_root');?>/js/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url() . $this->config->item('app_backend_asset_root');?>/js/dropdown-bootstrap-extended.js"></script>
    <script src="<?php echo base_url() . $this->config->item('app_backend_asset_root');?>/js/moment.js"></script>
    <?php
        if(isset($js)){
            $arrlength = count($js);
            for($x = 0; $x < $arrlength; $x++) {
                echo "<script type=\"text/javascript\" src=\"".base_url(). $this->config->item('app_backend_asset_root') . $js[$x]."\"></script>\n";
            }
        } 
    ?>
    <script src="<?php echo base_url() . $this->config->item('app_backend_asset_root');?>/js/plugins.js"></script>
    <script> 
        var App_url = "<?php echo base_url();?>";
        var App_date_format = "<?php echo $this->config_manager->config['date_format'];?>";
        var CSRF_NAME = "<?php echo $this->security->get_csrf_token_name(); ?>";
        var CSRF_HASH = "<?php echo $this->security->get_csrf_hash() ?>";
        var ajax_data        = {};
        ajax_data[CSRF_NAME] = CSRF_HASH;
   </script>
</body>
</html>