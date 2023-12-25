<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Categories</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li><a href="<?=base_url();?>agent/expenses">Expenses</a></li>
                    <li class="active"><span>Categories</span></li>
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
                            <h6 class="panel-title txt-dark">New Category</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/expense_categories">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <?php $attribute = array("id" => "genericFormValidation", 'class' => "form-horizontal");?>
                           <?php echo form_open('agent/add_expense_category', $attribute);?>
                            <div class="form-group">
                                <label class="control-label mb-10 col-sm-2" for="name">Name:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control required" id="name" name="name" value="<?php echo $this->form_validation->set_value('name');?>">
                                    <?php echo form_error('name'); ?>
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