<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Clients</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>admin/index">Dashboard</a></li>
                    <li class="active"><span>Clients</span></li>
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
                            <h6 class="panel-title txt-dark">View Client</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>admin/clients">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                          <?php $attribute = array("id" => "genericFormValidation");?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Name</label>
                                        <input type="text" class="form-control required" name="name"  value="<?php echo $client->name;?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Position</label>
                                        <input type="text" class="form-control required" name="position"  value="<?php echo $client->position;?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Discount(%)</label>
                                        <input type="number" class="form-control" name="discount" min="0"  value="<?php echo $client->discount;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Email Address</label>
                                        <input type="email" class="form-control required" name="email" value="<?php echo $client->email;?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Phone</label>
                                        <input type="text" class="form-control required" name="phone" value="<?php echo $client->phone;?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Postal Code</label>
                                        <input type="text" class="form-control" name="postal_code" value="<?php echo $client->postal_code;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Address</label>
                                        <input type="text" class="form-control required" name="address" value="<?php echo $client->address;?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">City</label>
                                        <input type="text" class="form-control required" name="city" value="<?php echo $client->city;?>">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label mb-10">State</label>
                                        <input type="text" class="form-control required" name="state" value="<?php echo $client->state;?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Notes</label>
                                        <textarea class="form-control required" rows="2" name="notes"> <?php echo $client->notes;?> </textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Payment info</label>
                                        <textarea class="form-control required" rows="2" name="payment_info"><?php echo $client->payment_info;?> </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>