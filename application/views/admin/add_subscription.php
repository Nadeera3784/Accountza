<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Subscriptions</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>admin/index">Dashboard</a></li>
                    <li class="active"><span>Subscriptions</span></li>
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
                        <h6 class="panel-title txt-dark">Add Subscription</h6>
                    </div>
                    <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>admin/subscriptions">Back</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                    <?php $attribute = array("id" => "genericFormValidation");?>
                    <?php echo form_open('admin/add_subscription', $attribute);?>
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" name="title" id="title" autocomplete="off" value="<?php echo $this->form_validation->set_value('title');?>">
                                    <?php echo form_error('title'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control required" name="email" id="email" autocomplete="off" value="<?php echo $this->form_validation->set_value('email');?>">
                                    <?php echo form_error('email'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control required" name="price" id="price" autocomplete="off" value="<?php echo $this->form_validation->set_value('price');?>">
                                    <?php echo form_error('price'); ?>
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