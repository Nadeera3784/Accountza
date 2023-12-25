<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Profile Settings</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Profile Settings</span></li>
                </ol>
            </div>

            <div class="col-md-12  mt-10">
              <?php $this->load->view('agent/alert'); ?>
            </div>
    
        </div>
    
        <div class="row">
            <div class="col-sm-12 col-xs-12 animate-element">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Update Profile Settings</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <?php $attribute = array("id" => "genericFormValidation", 'class' => "form-horizontal");?>
                           <?php echo form_open('agent/update_profile_settings', $attribute);?>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="first_name">First name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="first_name" name="first_name" value="<?php echo (isset($agent->first_name)) ? $agent->first_name : '' ;?>">
                                    <?php echo form_error('first_name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="last_name">Last name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="last_name" name="last_name" value="<?php echo (isset($agent->last_name)) ? $agent->last_name : '' ;?>">
                                    <?php echo form_error('last_name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="phone">Phone:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="phone" name="phone" value="<?php echo (isset($agent->phone)) ? $agent->phone : '' ;?>">
                                    <?php echo form_error('phone'); ?>
                                </div>
                            </div>
                            <div class="form-group mb-0"> 
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            <?php echo form_close();?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>