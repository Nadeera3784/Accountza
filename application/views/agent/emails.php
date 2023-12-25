<div class="page-wrapper">
    <div class="container">
        <div class="row heading-bg">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Emails</h5>
            </div>

            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?=base_url();?>agent/index">Dashboard</a></li>
                    <li class="active"><span>Emails</span></li>
                </ol>
            </div>

            <div class="col-md-12  mt-10">
              <div id="AjaxResponse"></div>
              <?php $this->load->view('agent/alert'); ?>
            </div>
    
        </div>
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="panel panel-default border-panel card-view">
                    <div class="panel-heading">
                        <div class="pull-left">
                            <h6 class="panel-title txt-dark">Emails</h6>
                        </div>
                        <div class="pull-right">
                           <span class="label label-primary">Premium</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">
                            <?php $attribute = array("class" => "form-horizontal", "id" => "genericFormValidation");?>
                            <?php echo form_open('agent/send_mails', $attribute);?>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">To</label>
                                    <div class="col-lg-10">
                                        <select class="select2 select2-multiple required" name="clients[]" multiple="multiple" data-placeholder="Choose">
                                            <?php foreach ($clients as $client) :?>
                                              <option value="<?php echo $client->client_id;?>"><?php echo $client->name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                         <?php echo form_error('clients'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Subject</label>
                                    <div class="col-lg-10">
                                        <input type="text" id="subject" name="subject" class="form-control required">
                                        <?php echo form_error('subject'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Message</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control required" rows="10"  name="message"></textarea>
                                        <?php echo form_error('message'); ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-primary" type="submit">Send</button>
                                    </div>
                                </div>
                            <?php echo form_close();?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>