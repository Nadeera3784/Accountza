<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Support</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Support</span></li>
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
                            <h6 class="panel-title txt-dark">New Ticket</h6>
                        </div>
                        <div class="pull-right">
                            <a class="btn btn-default btn-sm" href="<?php echo base_url();?>agent/support">Back</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                           <?php $attribute = array("id" => "genericFormValidation");?>
                           <?php echo form_open_multipart('agent/add_ticket', $attribute);?>
                            <div class="row">
                               <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Description</label>
                                        <textarea class="form-control required" rows="2" name="description"><?php echo $this->form_validation->set_value('description');?> </textarea>
                                        <?php echo form_error('description'); ?>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label mb-10">Attachment</label>
                                        <input type="file" name="attachment">
                                        <span class="help-block mt-2 mb-0"><small>png,gif,jpeg,jpg</small></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                         <button type="submit" class="btn btn-primary btn-sm"> Send</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close();?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>