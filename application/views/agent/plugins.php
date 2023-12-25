<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Plugins</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Plugins</span></li>
                </ol>
            </div>

            <div class="col-md-12  mt-10">
              <div id="AjaxResponse"></div>
              <?php $this->load->view('agent/alert'); ?>
            </div>
    
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12 animate-element">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Plugin List</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url();?>agent/add_ticket"> New</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body"> 
                           <div class="row">
                                <div class="col-md-3 mb-10 animated fadeIn">
                                    <div class="plugin_contianer">
                                        <div class="plugin-icon text-center">
                                        <i class="icon-calender"></i>
                                        </div>
                                        <h5 class="plugin-heading">Calandar</h5>
                                        <p class="plugin-text">Lorem ipsum dolor sit amet, labore et dolore magna aliqua.</p>
                                        <button type="button" class="btn btn-xs btn-primary pull-left">Deactivate</button>

                                        <a href="<?php echo base_url();?>agent/activate_plugin/calendar" class="btn btn-xs btn-primary pull-right">Activate</a> 
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>