<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Agents</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>admin/index">Dashboard</a></li>
                    <li class="active"><span>Agents</span></li>
                </ol>
            </div>

            <div class="col-md-12  mt-10">
              <?php $this->load->view('admin/alert'); ?>
            </div>
    
        </div>

      <div class="row">
      <div class="col-sm-12 col-xs-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark">Add Agent</h6>
                    </div>
                    <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>admin/agents">Back</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    <?php $attribute = array("id" => "genericFormValidation");?>
                    <?php echo form_open('admin/add_agent', $attribute);?>
                            <div class="form-group row">
                                <label for="first_name" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" name="first_name" id="first_name" autocomplete="off" value="<?php echo $this->form_validation->set_value('first_name');?>">
                                    <?php echo form_error('first_name'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" name="last_name" id="last_name" autocomplete="off" value="<?php echo $this->form_validation->set_value('last_name');?>">
                                    <?php echo form_error('last_name'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" name="phone" id="phone" autocomplete="off">
                                    <?php echo form_error('phone'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control required" name="email" id="email" autocomplete="off" value="<?php echo $this->form_validation->set_value('email');?>">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control required" name="password" id="password" autocomplete="off">
                                    <?php echo form_error('password'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password_confirm" class="col-sm-2 col-form-label">Password Confirm</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control required" name="password_confirm" id="password_confirm" autocomplete="off">
                                    <?php echo form_error('password_confirm'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="subscription_id" class="col-sm-2 col-form-label">Subscription</label>
                                <div class="col-sm-10">
                                    <select class="form-control required" id="subscription_id" name="subscription_id" required>
                                        <?php foreach($subscriptions as $subscription):?>
                                            <option value="<?php echo $subscription->subscription_id;?>"><?php echo $subscription->title;?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <?php echo form_error('subscription_id'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-sm-2" for="active">Active:</label>
                                <div class="col-sm-10">                                    
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="active" class="custom-control-input" id="active">
                                        <label class="custom-control-label" for="active"> Change</label>
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" name="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </div>
                        <?php echo form_close();?> 
                    </div>	
                </div>
            </div>
        </div>
      </div>