<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Company Settings</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Company Settings</span></li>
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
                            <h6 class="panel-title txt-dark">Update Company Settings</h6>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <?php $attribute = array("id" => "genericFormValidation", 'class' => "form-horizontal");?>
                           <?php echo form_open_multipart('agent/update_company_settings', $attribute);?>
                           <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_logo">Company logo:</label>
                                <div class="col-sm-10">
                                    <input type="file"  id="company_logo" name="company_logo">
                                    <?php echo form_error('company_logo'); ?>
                                     <small class="form-text">This image will be your default image for invoices and estimates. recommended size 300 x 300 pixels</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_name">Company name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="company_name" name="company_name" value="<?php echo (isset($settings->company_name)) ? $settings->company_name : '' ;?>">
                                    <?php echo form_error('company_name'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_street_01">Company Street 01:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="company_street_01" name="company_street_01" value="<?php echo (isset($settings->company_street_01)) ? $settings->company_street_01 : '' ;?>">
                                    <?php echo form_error('company_street_01'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_street_02">Company Street 02:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="company_street_02" name="company_street_02" value="<?php echo (isset($settings->company_street_02)) ? $settings->company_street_02 : '' ;?>">
                                    <?php echo form_error('company_street_02'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_city">Company City:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="company_city" name="company_city" value="<?php echo (isset($settings->company_city)) ? $settings->company_city : '' ;?>">
                                    <?php echo form_error('company_city'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_state">Company State:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="company_state" name="company_state" value="<?php echo (isset($settings->company_state)) ? $settings->company_state : '' ;?>">
                                    <?php echo form_error('company_state'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_postal_code">Company Postal Code:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="company_postal_code" name="company_postal_code" value="<?php echo (isset($settings->company_postal_code)) ? $settings->company_postal_code : '' ;?>">
                                    <?php echo form_error('company_postal_code'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_email_address">Company Email Address:</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control required" id="company_email_address" name="company_email_address" value="<?php echo (isset($settings->company_email_address)) ? $settings->company_email_address : '' ;?>">
                                    <?php echo form_error('company_postal_code'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="company_phone">Company Phone:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="company_phone" name="company_phone" value="<?php echo (isset($settings->company_phone)) ? $settings->company_phone : '' ;?>">
                                    <?php echo form_error('company_phone'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2">Currency:</label>
                                <div class="col-sm-10">
                                    <select class="form-control select2" name="currency" required>
                                        <?php foreach(currencies_list() as $key => $value):?>
                                        <option  value="<?php echo $key;?>" <?php echo (isset($settings->company_currency) && $settings->company_currency == $key) ? 'selected' : '';?>><?php echo $value['name'] ;?> (<?php echo $key;?>)</option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error('currency'); ?>
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