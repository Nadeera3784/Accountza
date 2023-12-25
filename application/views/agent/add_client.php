<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Clients</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Clients</span></li>
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
                            <h6 class="panel-title txt-dark">New Client</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/clients">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <?php $attribute = array("id" => "genericFormValidation");?>
                           <?php echo form_open('agent/add_client', $attribute);?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Name</label>
                                        <input type="text" class="form-control required" name="name"  value="<?php echo $this->form_validation->set_value('name');?>">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Position</label>
                                        <input type="text" class="form-control required" name="position"  value="<?php echo $this->form_validation->set_value('position');?>">
                                        <?php echo form_error('position'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Discount(%)</label>
                                        <input type="number" class="form-control" name="discount" min="0"  value="<?php echo $this->form_validation->set_value('discount');?>">
                                        <?php echo form_error('discount'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Email Address</label>
                                        <input type="email" class="form-control required" name="email" value="<?php echo $this->form_validation->set_value('email');?>">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Phone</label>
                                        <input type="text" class="form-control" name="phone" value="<?php echo $this->form_validation->set_value('phone');?>">
                                        <?php echo form_error('phone'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Postal Code</label>
                                        <input type="text" class="form-control" name="postal_code" value="<?php echo $this->form_validation->set_value('postal_code');?>">
                                        <?php echo form_error('postal_code'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Address</label>
                                        <input type="text" class="form-control required" name="address" value="<?php echo $this->form_validation->set_value('address');?>">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">City</label>
                                        <input type="text" class="form-control required" name="city" value="<?php echo $this->form_validation->set_value('city');?>">
                                        <?php echo form_error('city'); ?>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">State</label>
                                        <input type="text" class="form-control required" name="state" value="<?php echo $this->form_validation->set_value('state');?>">
                                        <?php echo form_error('state'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Notes</label>
                                        <textarea class="form-control required" rows="2" name="notes"> <?php echo $this->form_validation->set_value('notes');?> </textarea>
                                        <?php echo form_error('notes'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Payment info</label>
                                        <textarea class="form-control required" rows="2" name="payment_info"><?php echo $this->form_validation->set_value('payment_info');?> </textarea>
                                        <?php echo form_error('payment_info'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <button type="submit" class="btn btn-primary btn-sm"> Save</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close();?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>